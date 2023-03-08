<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(10);
        return view('admin.users', ['users'=>$users]);
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.addUser',compact('roles'));
    }

            /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view("admin.editUser", ['user'=>$user, 'roles'=>$roles]);
    }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role_id'=>'required',
            'image' =>'required|image|mimes:jpeg,png,jpg,gif',
            'phone'=>['required', 'string', 'min:10'],
            'user_id'=>'required'
        ]);
        $data['password'] = Hash::make($data['password']);
        $data['image'] = Storage::putFile("users", $data['image']);
        User::create($data);
        return redirect(url('dashboard/users'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => [ 'string', 'email', 'max:255', 'unique:'.User::class],
            'role_id'=>'required',
            'image' =>'image|mimes:jpeg,png,jpg,gif',
            'phone'=>['required', 'string', 'min:10'],
            'user_id'=>'required'

        ]);

        $users = User::findOrFail($id);
        if ($request->has("image")) {
            Storage::delete($users->image);
            $data['image'] = Storage::putFile("users", $data['image']);
        }
        $users->update($data);
        return redirect(url("dashboard/users"))->with('success', 'events updated successfully.');
    }

            /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $users = User::findOrFail($id);
        if ($users->image) {
            Storage::delete($users->image);
        }
        $users->delete();
        return redirect(url("dashboard/users"))->with('success', 'data deleted successfully');
    }
}
