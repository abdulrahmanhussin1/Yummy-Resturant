<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::all();
        return view("admin.gallery",["galleries"=>$galleries]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'image'=>'required|image|mimes:jpg,jpeg,png ',
            'user_id'=>'required'
        ]);
        $data['image'] = Storage::putFile("galleries",$data['image']);
        Gallery::create($data);
        return redirect(url('dashboard/gallery'));
    }

    public function delete($id)
    {
        $gallery = Gallery::find($id);
        Storage::delete($gallery->image);
        $gallery->delete();
        return redirect(url('dashboard/gallery'));

    }

}
