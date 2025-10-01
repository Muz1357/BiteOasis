<x-layout>
    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8 bg-[#FDF6EC]">
        <h2 class="text-center text-5xl font-bold mb-6 text-[#583E25] font-allura">My Orders</h2>

        @if($orders->isEmpty())
            <p class="text-[#7C6F62]">You haven't placed any orders yet.</p>
        @else
            @foreach($orders as $order)
                <div class="border border-black rounded-lg p-4 mb-6 bg-[#FFF8F5] shadow-md transition transform hover:shadow-lg hover:scale-[1.01]">
                    <h3 class="font-semibold text-lg text-[#583E25]">Order #{{ $order->id }}</h3>
                    <p class="text-[#BF9943] font-bold">Status: <span class="font-medium text-[#F72C01]">{{ ucfirst($order->status) }}</span></p>
                    <p class="text-[#BF9943] font-bold">Total Amount: <span class="font-bold text-[#F72C01]">LKR {{ $order->total_amount }}</span></p>

                    <table class="table-auto w-full mt-4 border border-black">
                        <thead class="bg-[#FFF1E0] text-[#583E25]">
                            <tr class="bg-gray-200">
                                <th class="px-4 py-2 border border-black">Product</th>
                                <th class="px-4 py-2 border border-black">Quantity</th>
                                <th class="px-4 py-2 border border-black">Price</th>
                            </tr>
                        </thead>
                        <tbody class="text-[#7C6F62] text-center">
                            @foreach($order->orderItems as $item)
                                <tr class="border border-black hover:bg-[#FFF4E5] transition">
                                    <td class="px-4 py-2 border border-black">{{ $item->product->name }}</td>
                                    <td class="px-4 py-2 border border-black">{{ $item->quantity }}</td>
                                    <td class="px-4 py-2 border border-black">${{ $item->price }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endforeach
        @endif
    </div>
</x-layout>
