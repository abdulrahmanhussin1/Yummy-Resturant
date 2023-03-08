<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cover;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoverController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $covers = Cover::all();
        return view("admin.cover",["covers"=>$covers]);
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
            'title'=>'required|string|max:100',
            'description'=>'required|string',
            'image'=>'image|mimes:jpg,png,jpeg,gif',
            'video'=>'string',
        ]);

        $covers = Cover::findOrFail(1);


        if($request->has("image"))
        {
            Storage::delete($covers->image);
            $data['image'] = Storage::putFile("cover",$data['image']);
        }

        $covers->update($data);
        return redirect(url("dashboard/cover"))->with('success','Cover updated successfully.');
    }

}
