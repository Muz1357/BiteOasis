<x-layout>
    <div class="bg-[#FDF6EC]">
        <!-- Hero Section -->
        <section class="relative bg-[#FFF8F5] text-[#583E25] py-20">
            <div class="container mx-auto px-6 md:px-12 text-center">
                <h1 class="text-4xl md:text-5xl font-bold mb-4">Welcome to BiteOasis</h1>
                <p class="text-lg md:text-xl max-w-2xl mx-auto text-[#7C6F62]">Fresh flavors, delightful bites, and a passion for serving you the best culinary experience.</p>
            </div>
        </section>

        <!-- Our Story -->
        <section class="py-16 px-6 md:px-12 container mx-auto bg-[#FDF6EC]">
            <div class="md:flex md:items-center md:gap-12">
                <div class="md:w-1/2 mb-8 md:mb-0">
                    <img src="{{ asset('images/aboutUsBg.jpg') }}" alt="Our Story" class="rounded-lg shadow-lg w-full border border-[#FFECD9]">
                </div>
                <div class="md:w-1/2">
                    <h2 class="text-3xl font-semibold mb-4 text-[#583E25]">Our Story</h2>
                    <p class="text-[#7C6F62] leading-relaxed mb-4">
                        BiteOasis was founded with a simple idea: to bring delicious, wholesome meals to your doorstep. From humble beginnings, we've grown into a community favorite, focused on quality, freshness, and a memorable dining experience.
                    </p>
                    <p class="text-[#7C6F62] leading-relaxed">
                        Every dish is crafted with care, combining passion and culinary expertise. Our commitment to excellence is what sets us apart and keeps our customers coming back for more.
                    </p>
                </div>
            </div>
        </section>

        <!-- Mission & Values -->
        <section class="bg-[#FDF6EC] py-16 px-6 md:px-12">
            <div class="text-center max-w-3xl mx-auto mb-12">
                <h2 class="text-3xl font-semibold mb-4 text-[#583E25]">Our Mission & Values</h2>
                <p class="text-[#7C6F62] leading-relaxed">
                    At BiteOasis, our mission is simple: serve the freshest, most flavorful meals while fostering a positive impact in our community. We believe in quality, integrity, and delight in every bite.
                </p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
                <div class="bg-[#FFF8F5] p-6 rounded-lg shadow border border-[#FFE0CC] hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold mb-2 text-[#583E25]">Fresh Ingredients</h3>
                    <p class="text-[#7C6F62]">We carefully select the finest ingredients to ensure every meal is bursting with flavor.</p>
                </div>
                <div class="bg-[#FFF8F5] p-6 rounded-lg shadow border border-[#FFE0CC] hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold mb-2 text-[#583E25]">Customer Delight</h3>
                    <p class="text-[#7C6F62]">Your satisfaction is our priority – we go the extra mile to serve you better.</p>
                </div>
                <div class="bg-[#FFF8F5] p-6 rounded-lg shadow border border-[#FFE0CC] hover:shadow-lg transition">
                    <h3 class="text-xl font-semibold mb-2 text-[#583E25]">Community First</h3>
                    <p class="text-[#7C6F62]">We support local producers and engage in initiatives that benefit our community.</p>
                </div>
            </div>
        </section>

        <section class="bg-[#FFF1E0] text-[#583E25] py-16 text-center">
            <h2 class="text-3xl md:text-4xl font-semibold mb-4">Join the BiteOasis Experience</h2>
            <p class="mb-6">Discover our menu and indulge in fresh, flavorful meals delivered right to you.</p>
            <a href="/products" class="inline-block bg-[#F72C01] text-[#FFF] font-semibold px-6 py-3 rounded-lg shadow hover:bg-[#FF6B35] transition">
                Explore Our Menu
            </a>
        </section>
    </div>
</x-layout>
<x-footer>
</x-footer>