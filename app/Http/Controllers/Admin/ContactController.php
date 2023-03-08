<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Contact::all();
        return view("admin.contact", ["contacts"=>$contacts]);
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->validate([
            'map'=>'required|string',
            'address'=>'required|string',
            'email'=>'required|string|email',
            'phone'=>'required|string',
            'hours'=>'required|string',
            'user_id'=>'required'
        ]);

        $contacts = Contact::findOrFail(1);

        $contacts->update($data);
        return redirect(url("dashboard/contact"))->with('success', 'contacts updated successfully.');
    }
}
