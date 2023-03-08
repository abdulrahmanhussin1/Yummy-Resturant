<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseYummy;
use Illuminate\Http\Request;

class WhyChooseYummyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wcys = WhyChooseYummy::all();
        return view("admin.why_choose_yummy",["wcys"=>$wcys]);
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
            'title1'=>'required|string|max:100',
            'desc1'=>'required|string',

            'title2'=>'required|string|max:100',
            'desc2'=>'required|string',

            'title3'=>'required|string|max:100',
            'desc3'=>'required|string',

            'title4'=>'required|string|max:100',
            'desc4'=>'required|string',

            'user_id'=>'required'

        ]);

        $wcys = WhyChooseYummy::findOrFail(1);
        $wcys->update($data);
        return redirect(url("dashboard/why_choose_yummy"))->with('success','why choose yummy updated successfully.');
    }
}
