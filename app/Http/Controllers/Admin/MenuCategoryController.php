<?php

namespace App\Http\Controllers\Admin;

use App\Models\MenuCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MenuCategoryController extends Controller
{
    public function index()
    {
        $menuCategories= MenuCategory::paginate(5);
        return view('admin.menuCategory',compact("menuCategories"));
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
            'name' =>'required|string|max:100',
            'user_id'=>'required'
        ]);
        MenuCategory::create($data);
        return redirect(url('dashboard/menuCategory'));
    }


        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menuCategory= MenuCategory::findOrFail($id);
        return view('admin.edit-menuCategory',["menuCategory"=>$menuCategory]);
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
        $id =$request->id;
        $data = $request->validate([
            'name' =>'required|string|max:100',
            'user_id'=>'required'
        ]);

        $menuCategory = MenuCategory::findOrFail($id);
        $menuCategory->update($data);
        return redirect(url("dashboard/menuCategory"))->with('success', 'testimonials updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $menuCategory = MenuCategory::findOrFail($id);
        $menuCategory->delete();
        return redirect(url("dashboard/menuCategory"))->with('success', 'data deleted successfully');
    }
}
