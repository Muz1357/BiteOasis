<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    // List all the available orders
    public function showO(){
        $orders = Order::with('user', 'orderItems.product')->get();
        return view('admin.orders.showO', compact('orders'));
    }

    // View a single order
    public function show($id){
        $order = Order::with('user', 'orderItems.product')->findOrFail($id);
        return view('admin.orders.showO', compact('order'));
    }

    // Update order status
    public function updateStatus(Request $request, $id){
        $validated = $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled'
        ]);

        $order = Order::findOrFail($id);
        $order->update($validated);

        return redirect()->route('admin.orders.showO')->with('Successful', 'Order status updated successfully');
    }

    // Delete/ cancel order
    public function destroy($id){
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('admin.orders.showO')->with('Successful', 'Order deleted!');
    }
}
