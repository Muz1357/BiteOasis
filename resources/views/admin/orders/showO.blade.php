<x-layout>
    <h2 class="text-[#583E25] font-allura text-5xl font-bold mb-4">Orders</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @foreach ($orders as $order)
            <div class="border border-black p-4 rounded-xl bg-[#FFF8F5]">
                <p class="text-[#583E25]">Customer: {{ $order->user->name ?? 'N/A' }}</p>
                <p class="mt-2 text-[#583E25]">Products:</p>
                <ul class="list-disc list-inside mb-2 text-sm text-[#7C6F62]">
                    @foreach ($order->orderItems as $item)
                        <li>{{ $item->product->name }} (x{{ $item->pivot->quantity ?? 1 }})</li>
                    @endforeach
                </ul>

                <p class="text-[#F72C01]">Total: LKR {{$order->total_amount ?? '0.00'}}</p>
                <p class="mt-2 text-[#583E25]">Status: {{ucfirst($order->status)}}</p>

                <form action="{{ route('admin.orders.updateStatus', $order->id) }}" method="POST" class="mt-2 text-[#BF9943]">
                    @csrf
                    <select name="status" onchange="this.form.submit()"
                        class="border p-2 rounded w-full">>
                        <option" value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="processing" {{ $order->status == 'processing' ? 'selected' : '' }}>Processing</option>
                        <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </form>

                <form method="POST" action="{{ route('admin.orders.destroy', $order->id) }}" class="mt-2">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-500 text-white px-3 py-1 rounded w-full"
                        onclick="return onclick('Are you sure?')">
                        Delete
                    </button>
                </form>
            </div>
        @endforeach
    </div>
</x-layout>