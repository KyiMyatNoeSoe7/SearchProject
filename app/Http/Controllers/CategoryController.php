<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {   
        $categories = Category::where('name', 'Like', "%".request('search')."%")->orderBy('id', 'DESC')->paginate(10);
        return view('category.index', compact('categories'));
    }

      /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required',
            ]);       
        $category = new Category();
        $category->name = $request->name;
        $category->save();
        return redirect('/category')->with('success', 'Category created successfully!');
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $category = Category::findOrFail($id);
        return view('category.edit', compact('category'));
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
        $request->validate([
            'name' => 'required',
            ]);       
        $category = Category::findOrFail($id);   
        $category->name = $request->name;
        $category->update();
        return redirect('/category')->with('success', 'Category updated successfully!');
    }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $category = Category::findOrFail($id); 
        $category->destroy($id);
        return redirect('/category')->with('success', 'Category deleted successfully!');
    }
}
