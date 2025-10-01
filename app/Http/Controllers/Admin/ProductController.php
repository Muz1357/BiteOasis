<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;


class ProductController extends Controller
{
    //Display all the products available
    public function showP(){
        $products = Product::all();
        return view('admin.products.showP', compact('products'));
    }

    //Display product form to create a product
    public function create(){
        return view('admin.products.create');
    }

    //To store a new product
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|min:5',
            'price' => 'required|numeric|min:0'
        ]);
        $product = Product::create($validated);
        return redirect()->route('admin.products.edit', $product->id)->with('success', 'Product added successfully');
    }

    //Show edit form
    public function edit($id){
        $product = Product::findOrFail($id);
        return view('admin.products.editP', compact('product'));
    }

    //Update the product
    public function update(Request $request, $id){
        $validated = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required|min:5',
            'price' => 'required|numeric|min:0'
        ]);
        $product = Product::findOrFail($id);
        $product->update($validated);
        return redirect()->route('admin.products.showP')->with('Success', 'Product updated!');
    }

    //Delete product
    public function destroy($id){
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('admin.products.showP')->with('Success', 'Product deleted!');
    }
}
