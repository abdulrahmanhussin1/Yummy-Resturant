<?php

namespace App\Http\Controllers\Admin;

use App\Models\BookTable;
use Illuminate\Http\Request;
use App\Models\ConfirmedBookTable;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ConfirmedBookTableController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $confirmedBookTables = ConfirmedBookTable::paginate(10);
        return view("admin.confirmedBookTable",["confirmedBookTables"=>$confirmedBookTables]);

    }
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request->validate([
            'book_tables_id'=>'unique:confirmed_book_tables,book_tables_id'
        ]);
        $bookTable = BookTable::findOrFail($id);

        if($bookTable){

            ConfirmedBookTable::create([
                'name'=>$bookTable->name,
                'email'=>$bookTable->email,
                'phone'=>$bookTable->phone,
                'date'=>$bookTable->date,
                'time'=>$bookTable->time,
                'people'=> $bookTable->people,
                'message'=>$bookTable->message,
                'book_tables_id'=>$bookTable->id,
                'user_id'=>Auth::user()->id
        ]);
        BookTable::destroy($id);

        }


        return redirect(url('dashboard/confirmedBookTable'));
    }

    public function confirmFromHome(Request $request, $id)
    {
    $request->validate([
        'book_tables_id'=>'unique:confirmed_book_tables,book_tables_id'
    ]);
    $bookTable = BookTable::findOrFail($id);
    if($bookTable){
    ConfirmedBookTable::create([
                'name'=>$bookTable->name,
                'email'=>$bookTable->email,
                'phone'=>$bookTable->phone,
                'date'=>$bookTable->date,
                'time'=>$bookTable->time,
                'people'=> $bookTable->people,
                'message'=>$bookTable->message,
                'book_tables_id'=>$bookTable->id,
                'user_id'=>Auth::user()->id
    ]);
    BookTable::destroy($id);
    }
    return redirect(url('/dashboard'));

    }

            /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
ConfirmedBookTable::destroy($id);
        return redirect(url("dashboard/confirmedBookTable"))->with('success', 'data deleted successfully');
    }
}
