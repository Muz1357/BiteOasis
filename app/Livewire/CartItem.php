<?php

namespace App\Livewire;

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class CartItem extends Component
{
    public $cartItem;
    public $quantity;

    protected $rules = [
        'quantity' => 'required|integer|min:1'
    ];

    public function mount($cartItem)
    {
        $this->cartItem = $cartItem;
        $this->quantity = $cartItem->quantity;
    }

    // Increment quantity
    public function increment()
    {
        $this->quantity++;
        $this->updateQuantity();
    }

    // Decrement quantity
    public function decrement()
    {
        if ($this->quantity > 1) {
            $this->quantity--;
            $this->updateQuantity();
        }
    }

    // Update quantity in DB
    public function updateQuantity()
    {
        $this->validate();

        $cart = Cart::where('id', $this->cartItem->id)
                    ->where('user_id', Auth::id())
                    ->first();

        if ($cart) {
            $cart->quantity = $this->quantity;
            $cart->save();
            $this->dispatch('cartUpdated');
        }
    }

    // Remove item from cart
    public function removeItem()
    {
        $cart = Cart::where('id', $this->cartItem->id)
                    ->where('user_id', Auth::id())
                    ->first();

        if ($cart) {
            $cart->delete();
            $this->dispatch('cartUpdated'); 
        }
    }
    
    public function render()
    {
        return view('livewire.cart-item');
    }
}
