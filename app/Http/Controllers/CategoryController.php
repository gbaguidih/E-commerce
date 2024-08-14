<?php

namespace App\Http\Controllers;

use App\Models\products;
use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = category::all();
        return view("categories.index", compact('categories'));
    }

    public function create()
    {
        return view("categories.create");
    }
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|string|max:255',
        
        ]);
        
        
        category::create($request->all());
        return redirect()->route('index.categories');
    }


    public function destroy($id)
    {
        $categories = category::findorFail($id);
        $categories->delete();
    }

    public function show($id)
    {
        $categories = category::findOrFail($id);
        $categories = category::all();
        return view("categories.show", compact('categories'));
    }

    public function edit($id)
    {
        $categories = category::find($id);
        return view('categories.edit', compact('categories'));
        

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $categories = category::findOrFail($id);
        $categories->update($request->all());
      

        return redirect()->route('index.categories');
    }

}
