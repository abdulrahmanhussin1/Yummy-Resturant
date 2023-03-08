<?php

namespace App\Http\Controllers\Admin;

use App\Models\Chef;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ChefsController extends Controller
{
    public function index()
    {
        $chefs = Chef::all();
        return view('admin.chefs', ["chefs"=>$chefs]);
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
            'title'=>'required|string|max:100',
            'name'=>'required|string|max:100',
            'desc'=>'required|string',
            'image'=>'required|image|mimes:jpeg,png,jpg,gif',
            'user_id'=>'required',
        ]);
        $data['image'] = Storage::putFile("chefs",$data['image']);
        Chef::create($data);
        return redirect(url('dashboard/chefs'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chefs = Chef::findOrFail($id);
        return view("admin.edit-chefs", ["chefs"=>$chefs]);
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
            'title'=>'required|string|max:100',
            'name'=>'required|string|max:100',
            'desc'=>'required|string',
            'image'=>'image|mimes:jpeg,png,jpg,gif',
            'user_id'=>'required',

        ]);

        $chefs = Chef::findOrFail($id);
        if ($request->has("image")) {
            Storage::delete($chefs->image);
            $data['image'] = Storage::putFile("chefs", $data['image']);
        }
        $chefs->update($data);
        return redirect(url("dashboard/chefs"))->with('success', 'chefs updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $chefs = Chef::findOrFail($id);
        Storage::delete($chefs->image);
        $chefs->delete();
        return redirect(url("dashboard/chefs"))->with('success', 'data deleted successfully');
    }
}
