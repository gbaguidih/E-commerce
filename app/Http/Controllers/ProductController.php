<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;


class ProductController extends Controller
{
    public function index()
    {
        $products = product::with('categories')->get();
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
            'description' => 'nullable|string',
            'price' => 'required|decimal:15,2',
            'stock' => 'required|integer',
            'category_id' => 'required|string|max:255',
        ]);
        
        product::create($request->all());
        return redirect('/products');
    }

    public function edit($id)
    {
        $product = product::find($id);
        $categories=category::all();
        return view('products.edit', compact('product','categories'));
    } 

    public function update(Request $request,Product $product)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|decimal:15,2',
            'stock' => 'required|integer',
            'categories_id' => 'required|string|max:255',
        ]);

        // $products = product::findOrFail($id);
        $product->update($request->all());

        return redirect('/products');
    }

    public function destroy($id){
    
        $product = product::findorFail($id);
        $product->delete();
    }


   
}
