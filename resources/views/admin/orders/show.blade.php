<x-layout>
    <h2 class="text-2xl font-bold mb-4">
        Order Details - #{{ $order->id }}
    </h2>

    <div class="mb-4 p-4 bg-white rounded shadow">
        <h3 class="font-semibold mb-2">Customer Info</h3>
        <p><strong>Name:</strong> {{ $order->user->name ?? 'N/A' }}</p>
        <p><strong>Email:</strong> {{ $order->user->email ?? 'N/A' }}</p>
        <p><strong>Contact:</strong> {{ $order->user->contact_info ?? 'N/A' }}</p>
    </div>

    <div class="mb-4 p-4 bg-white rounded shadow">
        <h3 class="font-semibold mb-2">Products in this Order</h3>
        <table class="w-full table-auto">
            <thead>
                <tr>
                    <th class="p-2 border">Product Name</th>
                    <th class="p-2 border">Quantity</th>
                    <th class="p-2 border">Price</th>
                    <th class="p-2 border">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->products as $product)
                    <tr>
                        <td class="p-2 border">{{ $product->name }}</td>
                        <td class="p-2 border">{{ $product->pivot->quantity ?? 1 }}</td>
                        <td class="p-2 border">${{ $product->price }}</td>
                        <td class="p-2 border">${{ ($product->price * ($product->pivot->quantity ?? 1)) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p class="text-right mt-2 font-bold">Total: ${{ $order->total ?? '0.00' }}</p>
    </div>

    <div class="mb-4 p-4 bg-white rounded shadow">
        <h3 class="font-semibold mb-2">Order Status</h3>
        <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <select name="status" onchange="this.form.submit()" class="border p-2 rounded">
                <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="Processing" {{ $order->status == 'Processing' ? 'selected' : '' }}>Processing</option>
                <option value="Completed" {{ $order->status == 'Completed' ? 'selected' : '' }}>Completed</option>
                <option value="Cancelled" {{ $order->status == 'Cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </form>
    </div>

    <div class="mb-4">
        <form method="POST" action="{{ route('admin.orders.destroy', $order->id) }}">
            @csrf
            @method('DELETE')
            <button class="bg-red-600 text-white px-4 py-2 rounded">Delete Order</button>
        </form>
    </div>

    <a href="{{ route('admin.orders.showO') }}" class="text-blue-500">← Back to Orders</a>
</x-layout>
