<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        // $products = product::with('category')->get();
        $products = product::all();
        return view("products.index", compact('products'));
    }

    public function create()
    {
        $categories = category::all();
        return view("products.create",compact('categories'));
    }


    public function store(Request $request)
    {
        
    
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required',
            'stock' => 'required',
            'category_id' => 'exists:categories,id',
        ]);
        
        product::create($request->all());
        return redirect('/products');
    }

    public function edit($id)
    {
        $products = product::find($id);
        $categories=category::all();
        return view('products.edit', compact('products','categories'));
    } 

    public function update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required',
            'stock' => 'required',
            'category_id' => 'exists:categories,id',
        ]);

        $products = product::findOrFail($id);
        $products->update($request->all());

        return redirect()->route('index.products');
    }

    public function destroy($id){
    
        $product = product::findorFail($id);
        $product->delete();
    }


   
}
