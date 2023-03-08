<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class EventsController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view("admin.events",["events"=>$events]);
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
            'desc' =>'required|string',
            'price'=>'required|integer|min:1',
            'image' =>'required|image|mimes:jpeg,png,jpg,gif',
            'user_id'=>'required'
        ]);
        $data['image'] = Storage::putFile("events",$data['image']);
        Event::create($data);
        return redirect(url('dashboard/events'));
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $events = Event::findOrFail($id);
        return view("admin.edit-events", ["events"=>$events]);
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
            'desc' =>'required|string',
            'price'=>'required|integer|min:1',
            'image' =>'image|mimes:jpeg,png,jpg,gif',
            'user_id'=>'required'
        ]);

        $events = Event::findOrFail($id);
        if ($request->has("image")) {
            Storage::delete($events->image);
            $data['image'] = Storage::putFile("events", $data['image']);
        }
        $events->update($data);
        return redirect(url("dashboard/events"))->with('success', 'events updated successfully.');
    }


        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $events = Event::findOrFail($id);
        Storage::delete($events->image);
        $events->delete();
        return redirect(url("dashboard/events"))->with('success', 'data deleted successfully');
    }
}
