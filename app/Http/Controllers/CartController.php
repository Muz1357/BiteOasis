<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Product;

class CartController extends Controller
{
    // Display all the available cart items
    public function displayC(){
        $cartItems = Cart::with('product')
        ->where('user_id', auth()->id())->get();

        return view('displayC', compact('cartItems'));
    }

    // Add items to the cart
    public function addC(Request $request, $productId){
        $request->validate(['quantity' => 'nullable|integer|min:1']);
        $qty = (int) $request->input('quantity', 1);

        $product = Product::findOrFail($productId);

        $item = Cart::firstOrNew([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
        ]);

        $item->quantity = ($item->exists ? $item->quantity : 0) + $qty;
        $item->save();

        return back()->with('succuss', 'Product added to cart');
    }

    // Update the quantity of the cart
    public function updateC(Request $request, $id){
        $request->validate(['quantity' => 'required|integer|min:1']);
        $item = Cart::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        $item->update(['quantity' => $request->quantity]);
        return back()->with('success', 'Cart updated');
    }

    //Remove an item from the cart
    public function removeC($id){
        $item = Cart::where('id', $id)->where('user_id', 
            auth()->id())->firstOrFail();
        
        $item->delete();
        return back()->with('success', 'Item removed');
    }
}
