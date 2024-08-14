<?php

namespace App\Http\Controllers;

use App\Models\product;
use App\Models\category;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        
        // Récupérer les catégories disponibles pour le filtrage
        $categories = Category::all();

        // Récupérer les paramètres de filtrage depuis la requête
        $category = $request->input('category');
        $stock = $request->input('stock');

        // Construire la requête de filtrage
        $query = Product::query();

        if ($category) {
            $query->where('category_id', $category);
            
        }
        if (is_numeric($stock)) {
            $query->where('stock', '>=', intval($stock));

        }

        $products = $query->get();
       
        return view('welcome', compact('products', 'categories'));
    }


   
}
