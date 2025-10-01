<x-layout>
    <div class="py-8 max-w-2xl mx-auto sm:px-6 lg:px-8 bg-[#FDF6EC] border-2 border-black rounded-xl">
        <h2 class="text-5xl font-allura font-bold mb-6 text-center text-[#583E25]">Checkout</h2>

        <!-- Bill Header -->
        <div class="text-center bg-[#FFF8F5] border border-black pb-3 mb-4 rounded-3xl">
            <h3 class="text-3xl font-allura font-bold text-[#7C6F62] mt-2">Order Summary</h3>
        </div>

        <!-- Items List -->
        <div class="mb-4">
            @foreach($cartItems as $item)
                <div class="flex justify-between py-2 border border-black bg-[#FFFDF8] px-4 rounded-3xl">
                    <div>
                        <p class="font-medium text-[#583E25]">{{ $item->product->name }}</p>
                        <p class="text-sm text-[#7C6F62]">Qty: {{ $item->quantity }} × LKR {{ number_format($item->product->price, 2) }}</p>
                    </div>
                    <p class="font-semibold text-[#F72C01]">LKR {{ number_format($item->product->price * $item->quantity, 2) }}</p>
                </div>
            @endforeach
        </div>

        <!-- Total -->
        <div class="border border-black pt-3 text-right bg-[#FFF8F5] px-4 py-4 rounded-3xl">
            <p class="text-lg font-bold text-[#F72C01]">Total: LKR {{ number_format($total, 2) }}</p>
        </div>

        <!-- Place Order Button -->
        <div class="mt-6 text-center">
            <form action="{{ route('orders.place') }}" method="POST">
                @csrf
                <button type="submit" 
                        class="bg-[#F72C01] text-white px-6 py-2 rounded hover:bg-[#FF6B35] transition">
                    Place Order
                </button>
            </form>
        </div>

        <!-- Footer -->
        <div class="text-center mt-4 text-xs text-[#7C6F62] border-t border-dashed pt-2 bg-[#FFF8F5] rounded">
            <p>Thank you for shopping with BiteOasis!</p>
        </div>
    </div>
</x-layout>
<x-footer>
</x-footer>