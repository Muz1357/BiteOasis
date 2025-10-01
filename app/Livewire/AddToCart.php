<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class AddToCart extends Component
{
    public $productId;

    public function add(){
        if (!Auth::check()){
            return redirect()->route('login');
        }

        $product = Product::findOrFail($this->productId);
        $item = Cart::firstOrNew([
            'user_id' => Auth::id(),
            'product_id' => $product->id,
        ]);

        $item->quantity = ($item->exits ? $item->quantity : 0) + 1;
        $item->save();

        $this->dispatch('cartUpdated');
        session()->flash('success', 'Product added to the cart');
    }

    public function render()
    {
        return view('livewire.add-to-cart');
    }
}
