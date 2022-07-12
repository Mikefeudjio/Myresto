<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\CategoryStorRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Categories = Category::all();
        return view('admin.Category.index', Compact('Categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.Category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStorRequest $request)
    {
        $image = $request -> file('image')->store('public/Categories');

        Category::create([
            'name'=> $request->name,
            'description'=>$request->description,
            'image' => $image
        ]);
        return to_route('admin.Category.index');

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
    public function edit(Category $Category)
    {
        return view('admin.Category.edite' , compact('Category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $Category)
    {
        
        $request->validate([
            'name'=>'required',
            'description'=>'required'
         ]);

         $image = $Category->image;
        if($request->hasFile('image'))
            {
                Storage::delete($Category->image);
                $image = $request -> file('image')->store('public/Categories');
            }
         
         $Category->update([
            'name'=> $request->name,
            'description'=> $request->description,
            'image'=> $image
         ]);
         return to_route('admin.Category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $Category)
    {
        Storage::delete($Category->image);
        $Category->delete();
        return to_route('admin.Category.index');
    }
}
