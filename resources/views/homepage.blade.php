<x-layout>
    <section class="relative w-full h-[90vh] flex items-center justify-center bg-black">
        <div class="absolute inset-0">
            <img src="{{ asset('Images/fastfood.jpg') }}" alt="Luxury Fast Food" class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black/60"></div>
        </div>
        <div class="relative z-10 text-center px-6 lg:px-20">
            <h1 class="text-4xl lg:text-6xl font-extrabold text-white leading-light">
                Luxury Fast Food <br>
                Delivered Fast
            </h1>

            <p class="text-gray-200 mt-4 text-base lg:text-lg max-w-2xl mx-auto">
                Experience premium quality fast food delivered to your doorstep in minutes.
                Taste the difference luxury makes.
            </p>

            <div class="mt-8 flex flex-col sm:flex-row gap-4 justify-center">
                <a href="/products"
                    class="bg-[#BF9943] px-6 py-3 rounded-lg font-semibold text-[#583E25] hover:bg-[#BA4A19] transition">
                    Order Now
                </a>
                <a href="/about"
                    class="bg-[#BF9943] px-6 py-3 rounded-lg font-semibold text-[#583E25] hover:bg-[#BA4A19] transition">
                    About us
                </a>
            </div>

            <div class="mt-10 flex flex-col sm:flex-row gap-6 justify-center text-gray-300 text-sm">
                <div class="flex items-center gap-2">
                    <span class="text-[#583E25]">⏱️</span> Premium quality
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-[#583E25]">⭐</span> Under 30 minutes
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-[#583E25]">🚚</span> Free delivery
                </div>                
            </div>
        </div>
    </section>
    {{-- Featured Delights Section --}}
    <section class="bg-[#FDF6EC] text-white py-16">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-[#140F0B] text-3xl font-bold mb-4">
                Featured <span class="text-[#F72C01]">Delights</span>
            </h2>
            <p class="text-[#583E25] mb-10">
                Handcrafted perfection meets lightning-fast service. Each dish tells a story of culinary excellence.
            </p>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-2">
                <div class="bg-[#FFF8F5] border border-black rounded-xl shadow p-6 hover:shadow-lg hover:scale-[1.01] transition duration-300">
                    <div class="text-4xl mb-4">🍔</div>
                    <h3 class="text-[#140F0B] text-xl font-semibold mb-2">Royal Burger</h3>
                    <p class="text-[#583E25] mb-4">
                        Premium beef patty with truffle aioli, aged cheddar, and caramelized onions
                    </p>
                    <p class="text-[#F72C01] text-xl font-bold mb-4">LKR 5,600</p>
                    <a href="/products" class="w-full border border-[#F72C01] text-[#000] rounded-lg mt-4 mb-4 px-28 py-2 hover:bg-[#BA4A19] hover:text-black transition">
                        Add to Cart
                    </a>
                </div>

                <div class="bg-[#FFF8F5] border border-black rounded-xl shadow p-6 hover:shadow-lg hover:scale-[1.01] transition duration-300">
                    <div class="text-4xl mb-4">🍗</div>
                    <h3 class="text-[#140F0B] text-xl font-semibold mb-2">Golden Crispy</h3>
                    <p class="text-[#583E25] mb-4">
                        Hand-breaded chicken with our signature spice blend and honey glaze
                    </p>
                    <p class="text-[#F72C01] text-xl font-bold mb-4">LKR 4,200</p>
                    <a href="/products" class="w-full border border-[#F72C01] text-[#000] rounded-lg mt-4 mb-4 px-28 py-2 hover:bg-[#BA4A19] hover:text-black transition">
                        Add to Cart
                    </a>
                </div>
                
                <div class="bg-[#FFF8F5] border border-black rounded-xl shadow p-6 hover:shadow-lg hover:scale-[1.01] transition duration-300">
                    <div class="text-4xl mb-4">🍟</div>
                    <h3 class="text-[#140F0B] text-xl font-semibold mb-2">Gourmet Fries</h3>
                    <p class="text-[#583E25] mb-4">
                        Triple-cooked fries with rosemary salt and parmesan dust
                    </p>
                    <p class="text-[#F72C01] text-xl font-bold mb-4">LKR 2,000</p>
                    <a href="/products" class="w-full border border-[#F72C01] text-[#000] rounded-lg mt-4 mb-4 px-28 py-2 hover:bg-[#BA4A19] hover:text-black transition">
                        Add to Cart
                    </a>
                </div>
            </div>
        </div>
    </section>

    {{-- Crafted with Passion Section --}}
    <section class="bg-[#FDF6EC] text-white py-16">
        <div class="container mx-auto px-6 grid grid-cols-1 md:grid-cols-2 gap-10 items-center">
            
            <!-- Left Text Content -->
            <div>
                <h2 class="text-3xl font-bold mb-4 text-[#140F0B]">
                    Crafted with <span class="text-[#F72C01]">Passion</span>
                </h2>
                <p class="text-[#583E25] mb-4">
                    We revolutionized fast food by refusing to compromise on quality. 
                    Every ingredient is carefully sourced, every recipe perfected through countless iterations.
                </p>
                <p class="text-[#583E25] mb-6">
                    From our hand-cut fries to our signature sauces made fresh daily, 
                    we believe that fast food should never mean sacrificing flavor or quality.
                </p>

                <div class="flex space-x-10">
                    <div>
                        <p class="text-[#F72C01] text-2xl font-bold">98%</p>
                        <p class="text-[#9C7C59]">Customer Satisfaction</p>
                    </div>
                    <div>
                        <p class="text-[#F72C01] text-2xl font-bold">2min</p>
                        <p class="text-[#9C7C59]">Average Wait Time</p>
                    </div>
                </div>
            </div>

            <!-- Right Card -->
            <div class="bg-[#FFF8F5] border border-black rounded-xl shadow-lg p-8 text-center hover:shadow-lg hover:scale-[1.01] transition duration-300"">
                <div class="text-5xl mb-4">👨‍🍳</div>
                <h3 class="text-[#140F0B] text-xl font-bold mb-2">Master Chefs</h3>
                <p class="text-[#140F0B]">
                    Our culinary team brings decades of fine dining experience to every fast food creation.
                </p>
            </div>
        </div>
    </section>
</x-layout>
<x-footer>
</x-footer>
