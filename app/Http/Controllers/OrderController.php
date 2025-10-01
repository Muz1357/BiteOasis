<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    // Display the checkout page with cart items
    public function checkout()
    {
        $cartItems = Cart::where('user_id', Auth::id())->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.displayO')->with('error', 'Your cart is empty.');
        }

        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('checkout', compact('cartItems', 'total'));
    }

    // Place the order from the cart
    public function placeOrder(Request $request)
    {
        $userId = Auth::id();
        $cartItems = Cart::where('user_id', $userId)->with('product')->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.displayO')->with('error', 'Your cart is empty.');
        }

        // Wrap in transaction to ensure consistency
        DB::transaction(function () use ($cartItems, $userId) {
            $totalAmount = $cartItems->sum(function ($item) {
                return $item->product->price * $item->quantity;
            });

            // Create the order
            $order = Order::create([
                'user_id' => $userId,
                'total_amount' => $totalAmount,
                'status' => 'pending' // default status
            ]);

            // Create order items
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price
                ]);
            }

            // Clear user's cart
            Cart::where('user_id', $userId)->delete();
        });

        return redirect()->route('orders.displayO')->with('success', 'Your order has been placed successfully!');
    }

    // Display all orders for the logged-in user
    public function displayO()
    {
        $orders = Order::where('user_id', Auth::id())->with('orderItems.product')->get();
        return view('displayO', compact('orders'));
    }
}
