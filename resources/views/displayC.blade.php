<x-layout>
    <div class="py-8 max-w-7xl mx-auto sm:px-6 lg:px-8 bg-[#FDF6EC]">
        <h2 class="text-center text-5xl font-allura font-bold mb-6 text-[#583E25] border-[#F72C01]">Your Cart</h2>
        <a href="/products" class="bg-[#F72C01] text-white px-4 py-2 rounded hover:bg-[#FF6B35] transition">
            Visit Products
        </a>
        
        @if($cartItems->isEmpty())
            <p class="mt-6 text-[#583E25]">Your cart is empty.</p>
        @else
        <table class="bg-white table-auto w-full border-2 border-black border-collapse mt-6">
            <thead>
            <tr class="bg-[#FFF1E0] text-[#583E25]">
                <th class="px-4 py-2 border border-black">Product</th>
                <th class="px-4 py-2 border border-black">Quantity</th>
                <th class="px-4 py-2 border border-black">Price</th>
                <th class="px-4 py-2 border border-black">Actions</th>
            </tr>
            </thead>
            <tbody class="border border-black text-[#7C6F62]">
                @foreach($cartItems as $item)
                    <livewire:cart-item :cartItem="$item" :key="$item->id" />
                @endforeach
            </tbody>
        </table>
        @endif
    </div>

    @if(!$cartItems->isEmpty())
        <div class="mt-6 flex justify-end">
            <a href="{{ route('orders.checkout') }}" class="bg-[#F72C01] text-white px-4 py-2 rounded hover:bg-[#FF6B35] transition">
                Proceed to Checkout
            </a>
        </div>
    @endif
</x-layout>
<x-footer>
</x-footer>