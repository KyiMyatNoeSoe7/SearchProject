<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $products = Product::where('name', 'Like', "%".request('search')."%")->orderBy('id', 'DESC')->paginate(10);
        return view('product.index', compact('products'));
    }

    public function create()
    {   
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function edit($id) {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('product.edit', compact('product','categories'));
    }
   
    public function store(Request $request)
    {   
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'category_id' => 'required'
        ]);   
        $product = new Product();
        $product->name = $request->name;
        $product->price = $request->price;
        $product->save();
        $product->categories()->attach($request->category_id);

        return redirect('/product')->with('success', 'Product created successfully!');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('product.index',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) 
    {   
        $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|integer',
            'category_id' => 'required'
        ]);   
        $product = Product::findOrFail($id);
        $product->name = $request->name;
        $product->price = $request->price;
        $product->update();
        $product->categories()->sync($request->category_id);

        return redirect('/product')->with('success', 'Product updated successfully!');
    }
   
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
   
        $product->delete();

        return redirect('/product')->with('success', 'Product deleted successfully!');
    }
}
