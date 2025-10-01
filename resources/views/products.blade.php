<x-layout>
    <div class="px-4 lg:px-20 py-6 bg-[#FDF6EC]">
        <h2 class="text-center font-allura font-bold text-6xl text-[#583E25] mb-4">{{ $title ?? 'Menu' }}</h2>

        <a href="/cart" class="bg-[#F72C01] text-white px-4 py-2 rounded hover:bg-[#FF6B35] transition">
            View Cart
        </a>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-10">
            @foreach($products as $product)
                <div class="relative bg-[#FFFFFF] border border-[#583E25] rounded-2xl p-4 flex items-start gap-4 shadow-md transition transform hover:shadow-lg hover:scale-[1.01]">
                    {{-- Text side --}}
                    <div class="flex-1 pr-3">
                        <h3 class="text-l   g text-[#583E25] font-semibold mb-1">{{ $product->name }}</h3>
                        <p class="text-sm font-semibold text-[#F72C01] mb-2">
                            LKR {{ number_format($product->price, 2) }}
                        </p>
                        <p class="text-sm text-[#7C6F62]">
                            {{ $product->description }}
                        </p>
                    </div>

                    {{-- Image side --}}
                    <div class="w-28 h-20 sm:w-36 sm:h-28 lg:w-44 lg:h-36 relative flex-shrink-0">
                        <img src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            class="w-full h-full object-cover rounded-xl border border-[#FFECD9]">

                        {{-- Add to cart button --}}
                        <div class="absolute right-2 bottom-2">
                            <livewire:add-to-cart :productId="$product->id" :key="$product->id" />
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
<x-footer>
</x-footer>