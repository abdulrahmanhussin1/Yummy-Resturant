<?php

namespace App\Http\Controllers\Admin;

use App\Models\About;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $abouts = About::all();
        return view("admin.about", ["abouts" => $abouts]);
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
            'title' => 'required|string|max:100',
            'desc' => 'required|string',
            'image' => 'image|mimes:jpg,png,jpeg,gif',
            'background_image' => 'image|mimes:jpg,png,jpeg,gif',
            'video' => 'string',
            'contact' => 'required|string|max:100',
            'phone' => 'required|string|max:20',
            'user_id' => 'required'
        ]);

        $about = About::findOrFail(1);


        if ($request->has("image")) {
            Storage::delete($about->image);
            $data['image'] = Storage::putFile("about", $data['image']);
        }

        if ($request->has("background_image")) {
            Storage::delete($about->background_image);
            $data['background_image'] = Storage::putFile("about", $data['background_image']);
        }
        $about->update($data);
        return redirect(url("dashboard/about"))->with('success', 'about updated successfully.');
    }
}
