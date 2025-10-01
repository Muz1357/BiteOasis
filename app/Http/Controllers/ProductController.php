<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //Display all the available products
    public function showPro(){
        $products = Product::all();
        return view('products', compact('products'));
    }

}
