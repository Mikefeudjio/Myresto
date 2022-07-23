<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\MenuRequestMenu;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Menu = Menu::all();
    return view('admin.Menu.index' , Compact('Menu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Categories = Category::all();
        return view('admin.Menu.create', compact('Categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuRequestMenu $request)
    {
        
        $image = $request -> file('image')->store('public/Menu');

        $Menu = Menu::create([
            'name'=> $request->name,
            'price'=> $request->price,
            'description'=>$request->description,
            'image' => $image
        ]);
        if($request->has('Categories')){
            $Menu ->Categories->attach($request->Categories);
        }
        return to_route('admin.Menu.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Menu $Menu)
    {
        $Categories = Category::all();
        return view('admin.Menu.edit', Compact('Categories','Menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $Menu)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'price'=>'required'
         ]);

         $image = $Menu->image;
        if($request->hasFile('image'))
            {
                Storage::delete($Menu->image);
                $image = $request -> file('image')->store('public/Menu');
            }
         
         $Menu->update([
            'name'=> $request->name,
            'description'=> $request->description,
            'image'=> $image
         ]);
         if($request->has('Categories')){
            $Menu ->Categories->sync($request->Categories);
        }
         return to_route('admin.Menu.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $Menu)
    {
        Storage::delete($Menu->image);
        $Menu->delete();
        return to_route('admin.Menu.index');
    }
}
