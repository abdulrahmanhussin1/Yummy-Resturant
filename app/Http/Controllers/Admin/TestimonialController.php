<?php

namespace App\Http\Controllers\Admin;


use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::all();
        return view('admin.testimonials', ["testimonials"=>$testimonials]);
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
            'title' =>'required|string|max:100',
            'name' =>'required|string|max:100',
            'review' =>'required|string',
            'image' =>'required|image|mimes:jpeg,png,jpg,gif',
            'user_id'=>'required'
        ]);
        $data['image'] = Storage::putFile("testimonials",$data['image']);
        Testimonial::create($data);
        return redirect(url('dashboard/testimonials'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonials = Testimonial::findOrFail($id);
        return view("admin.edit-testimonials", ["testimonials"=>$testimonials]);
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
            'title' =>'required|string|max:100',
            'name' =>'required|string|max:100',
            'review' =>'required|string',
            'image' =>'image|mimes:jpeg,png,jpg,gif',
            'user_id'=>'required'
        ]);

        $testimonials = Testimonial::findOrFail($id);
        if ($request->has("image")) {
            Storage::delete($testimonials->image);
            $data['image'] = Storage::putFile("testimonials", $data['image']);
        }
        $testimonials->update($data);
        return redirect(url("dashboard/testimonials"))->with('success', 'testimonials updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $testimonials = Testimonial::findOrFail($id);
        Storage::delete($testimonials->image);
        $testimonials->delete();
        return redirect(url("dashboard/testimonials"))->with('success', 'data deleted successfully');
    }
}
