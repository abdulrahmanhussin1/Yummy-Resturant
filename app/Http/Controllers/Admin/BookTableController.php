<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\BookTable;
use Illuminate\Http\Request;
use App\Notifications\TabelBooked;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class BookTableController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookTable = /* DB::table('book_tables')->orderBy('updated_at', 'desc')->paginate(10) */ BookTable::paginate(3);
        return view("admin.BookedTable",["bookTable"=>$bookTable]);

    }

            /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addBook_table');
    }

    public function readAllNotification()
    {
        $user = User::find(auth()->user()->id);
        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }

        return redirect()->back();

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
            'name'=>'required|string|max:100',
            'email'=>'required|string|max:100',
            'phone'=>'required|string|max:20',
            'date'=>'required|date|after:today',
            'time'=>'required',
            'people'=> 'required|numeric|min:1|max:300',
            'message'=>'required|string',
            'user_id'=>'required'
        ]);

        $bookTable = BookTable::create($data);
        $users = User::where('id','!=',auth()->user()->id->get());
        $created_user = auth()->user()->name;
        $notification_content = "$created_user Booked Table successfully";
        Notification::send($users, new TabelBooked($bookTable->id,$created_user,$notification_content));

        return redirect(url('dashboard/bookedTable'));
    }
                /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFromHome(Request $request)
    {

        $data = $request->validate([
            'name'=>'required|string|max:100',
            'email'=>'required|string|max:100',
            'phone'=>'required|string|max:20',
            'date'=>'required|date|after:today',
            'time'=>'required',
            'people'=> 'required|numeric|min:1|max:300',
            'message'=>'required|string',
            'user_id'=>'nullable'
        ]);

        $bookTable = BookTable::create($data);
        $users = User::all();
        $created_user = $bookTable->name;
        $notification_content = "$created_user Booked Table successfully";
        Notification::send($users, new TabelBooked($bookTable->id,$created_user,$notification_content));
        return redirect(url('/#book-a-table'))->with('you Booked table successfully . please wait our response to confirm your reservation');
    }

                /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookTable = BookTable::findOrFail($id);
        return view("admin.editBookedTable", ["bookTable"=>$bookTable]);
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
            'name'=>'required|string|max:100',
            'email'=>'required|string|max:100',
            'phone'=>'required|string|max:20',
            'date'=>'required|date|after:today',
            'time'=>'required',
            'people'=> 'required|numeric|min:1|max:300',
            'message'=>'required|string',
            'user_id'=>'required'
        ]);

        $bookTable = BookTable::findOrFail($id);
        $bookTable->update($data);
        return redirect(url("dashboard/bookedTable"))->with('success', 'book updated successfully.');
    }


        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        BookTable::destroy($id);

        return redirect(url("dashboard/bookedTable"))->with('success', 'data deleted successfully');
    }
}
