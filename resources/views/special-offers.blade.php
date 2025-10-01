<x-layout>
    <div class="max-w-6xl mx-auto py-10 px-4 bg-[#FDF6EC]">
        <!-- Page Title -->
        <h1 class="text-4xl font-allura font-bold text-center text-[#F72C01] mb-12">Special Offers</h1>

        <!-- Offers Grid -->
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Offer 1 -->
            <div class="bg-[#FFF1E0] rounded-3xl shadow-lg p-6 hover:scale-105 transition-transform duration-300">
                <img src="{{ asset('images/subOff.jpg') }}" 
                     alt="Submarine Sandwich" 
                     class="w-full h-44 object-cover rounded-2xl mb-4 border-2 border-[#F72C01]">

                <h2 class="text-2xl font-bold mb-2 text-[#583E25]">Submarine Sandwich</h2>
                <p class="text-[#F72C01] text-2xl font-extrabold mb-2">25% OFF</p>
                <p class="text-[#583E25] text-sm">
                    Valid: Sep 20, 2025 - Oct 5, 2025
                </p>
            </div>

            <!-- Offer 2 -->
            <div class="bg-[#FFF1E0] rounded-3xl shadow-lg p-6 hover:scale-105 transition-transform duration-300">
                <img src="{{ asset('images/pizzaOff.jpeg') }}" 
                     alt="Pizza" 
                     class="w-full h-44 object-cover rounded-2xl mb-4 border-2 border-[#F72C01]">

                <h2 class="text-2xl font-bold mb-2 text-[#583E25]">Classic Pizza</h2>
                <p class="text-[#F72C01] text-2xl font-extrabold mb-2">15% OFF</p>
                <p class="text-[#583E25] text-sm">
                    Valid: Sep 22, 2025 - Oct 10, 2025
                </p>
            </div>

            <!-- Offer 3 -->
            <div class="bg-[#FFF1E0] rounded-3xl shadow-lg p-6 hover:scale-105 transition-transform duration-300">
                <img src="{{ asset('images/burgerOff.jpg') }}" 
                     alt="Burger" 
                     class="w-full h-44 object-cover rounded-2xl mb-4 border-2 border-[#F72C01]">

                <h2 class="text-2xl font-bold mb-2 text-[#583E25]">Royal Burger</h2>
                <p class="text-[#F72C01] text-2xl font-extrabold mb-2">30% OFF</p>
                <p class="text-[#583E25] text-sm">
                    Valid: Sep 25, 2025 - Oct 15, 2025
                </p>
            </div>
        </div>
    </div>
</x-layout>
<x-footer>
</x-footer>