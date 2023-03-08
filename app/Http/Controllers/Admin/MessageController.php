<?php

namespace App\Http\Controllers\Admin;

use App\Models\Message;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessageController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages =  Message::orderBy('updated_at', 'desc')->paginate(10);
        return view("admin.mailbox.mail", ["messages" => $messages]);
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
            'name' => 'required|string|max:100',
            'email' => 'required|string|max:100',
            'subject' => 'required|string|max:50',
            'message' => 'required|string',
        ]);
        Message::create($data);
        return redirect('/#contact')->with('success', 'email sent successfully');
    }

    public function show($id)
    {
        $messages = Message::findOrFail($id);
        return view("admin.mailbox.mailDetails", ["messages" => $messages]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $mails = Message::findOrFail($id);
        $mails->delete();
        return redirect(url('/dashboard/message'))->with('success', 'data deleted successfully');
    }
}
