<?php

namespace App\Http\Controllers\Admin;

use App\Models\MenuItem;
use App\Models\MenuCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;


class MenuItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menuItems = MenuItem::paginate(10);
        $menuCategory= MenuCategory::all();
        return view("admin.menuItem",["menuItems"=>$menuItems ,"menuCategory"=>$menuCategory ]);
    }
    public function create()
    {
        $menuItems = MenuItem::all();
        $menuCategory= MenuCategory::all();
        return view("admin.addMenuItem",["menuItems"=>$menuItems ,"menuCategory"=>$menuCategory ]);
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
            'desc' =>'required|string',
            'menu_categories_id'=>'required|integer',
            'price'=>'required|integer|min:1',
            'image' =>'required|image|mimes:jpeg,png,jpg,gif',
            'user_id'=>'required',

        ]);
        $data['image'] = Storage::putFile("menu/items",$data['image']);
        MenuItem::create($data);
        return redirect(url('dashboard/menuItem'));
    }

        /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menuItems = MenuItem::findOrFail($id);
        $menuCategory= MenuCategory::all();

        return view("admin.edit-menuItem", ["menuItems"=> $menuItems,"menuCategory"=>$menuCategory ]);
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
            'name' =>'required|string|max:100',
            'desc' =>'required|string',
            'menu_categories_id'=>'required|integer',
            'price'=>'required|integer|min:1',
            'image' =>'image|mimes:jpeg,png,jpg,gif',
            'user_id'=>'required',

        ]);

        $menuItems = MenuItem::findOrFail($id);
        if ($request->has("image")) {
            Storage::delete($menuItems->image);
            $data['image'] = Storage::putFile("menu/items", $data['image']);
        }
        $menuItems->update($data);
        return redirect(url("dashboard/menuItem"))->with('success', 'menuItems updated successfully.');
    }


        /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $menuItems = MenuItem::findOrFail($id);
        Storage::delete($menuItems->image);
        $menuItems->delete();
        return redirect(url("dashboard/menuItem"))->with('success', 'data deleted successfully');
    }


}
