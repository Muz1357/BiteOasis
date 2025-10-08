<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;      
use App\Models\ApiProduct;   

class ApiProductController extends Controller
{
    /**
     * Display all products from MongoDB
     */
    public function index()
    {
        $products = ApiProduct::all(); 
        return response()->json($products);
    }

    public function store(Request $request)
    {
        // Validate incoming request
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|min:5',
            'price' => 'required|numeric|min:0',
            'category' => 'nullable|string|max:100', 
            'image' => 'nullable|string|max:255'   
        ]);

        // Save to MySQL
        $product = Product::create([
            'name' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price']
        ]);

        // Save to MongoDB
        ApiProduct::create([
            'mysql_id' => $product->id,               
            'title' => $validated['name'],
            'description' => $validated['description'],
            'price' => $validated['price'],
            'category' => $validated['category'],
            'image' => $validated['image'] ?? null
        ]);

        // Redirect back with success message
        return redirect()->route('admin.products.edit', $product->id)
                         ->with('success', 'Product added successfully in MySQL and MongoDB.');
    }
    
    public function showProducts()
    {
        $products = ApiProduct::all();
        return response()->json($products);
    }
}