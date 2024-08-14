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
        $categoryId = $request->input('category');
        $inStock = $request->input('in_stock');

        // Construire la requête de filtrage
        $query = Product::query();

        if ($categoryId) {
            $query->where('category_id', $categoryId);
        }

        if ($inStock !== null) {
            $query->where('stock', '>', 0);
        }

        $products = $query->get();

        return view('welcome', compact('products', 'categories'));
    }

   
}
