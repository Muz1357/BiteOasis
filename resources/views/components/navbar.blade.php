<nav class="bg-[#FFECD9] backdrop-blur-md flex items-center justify-between text-[#FCF9F6] p-4 mt-10 mx-6 rounded-full shadow-lg relative z-50">
    <div class="flex items-center gap-4">
        <img src="{{ asset('images/logo.png') }}" alt="BiteOasis Logo" class="h-[70px] w-[70px] ml-2 rounded-3xl">
        <h1 class="font-allura font-bold text-4xl text-[#F72C01] hover:text-[#BA4A19]">BiteOasis</h1>
    </div> 
    <ul class="flex gap-4 mx-auto [font-family:'Montserrat',sans-serif]">
        <li><a href="/" class="text-[#583E25] px-4 py-2 rounded-full 
        transition-all duration-300 hover:bg-gradient-to-r hover:from-[#FFD0A3] hover:to-[#FFB77A] hover:text-gray-900 hover:scale-105">Home</a></li>

        @php
            $user = Auth::user();
        @endphp

        @if($user)
            @if($user->role === 'admin')
                <!-- <li><a href="/admin" class="text-[#583E25] px-4 py-2 rounded-full transition-all duration-300 hover:bg-gradient-to-r hover:from-[#FFD0A3] hover:to-[#FFB77A] hover:text-gray-900 hover:scale-105">Dashboard</a></li> -->
                <li><a href="/admin/products" class="text-[#583E25] px-4 py-2 rounded-full transition-all duration-300 hover:bg-gradient-to-r hover:from-[#FFD0A3] hover:to-[#FFB77A] hover:text-gray-900 hover:scale-105">Manage Products</a></li>
                <li><a href="/admin/users" class="text-[#583E25] px-4 py-2 rounded-full transition-all duration-300 hover:bg-gradient-to-r hover:from-[#FFD0A3] hover:to-[#FFB77A] hover:text-gray-900 hover:scale-105">Manage Users</a></li>
                <li><a href="/admin/orders" class="text-[#583E25] px-4 py-2 rounded-full transition-all duration-300 hover:bg-gradient-to-r hover:from-[#FFD0A3] hover:to-[#FFB77A] hover:text-gray-900 hover:scale-105">Orders</a></li>
            @else
                <li><a href="/products" class="text-[#583E25] px-4 py-2 rounded-full transition-all duration-300 hover:bg-gradient-to-r hover:from-[#FFD0A3] hover:to-[#FFB77A] hover:text-gray-900 hover:scale-105">Menu</a></li>
                <li><a href="/offers" class="text-[#583E25] px-4 py-2 rounded-full transition-all duration-300 hover:bg-gradient-to-r hover:from-[#FFD0A3] hover:to-[#FFB77A] hover:text-gray-900 hover:scale-105">Special offers</a></li>
                <li><a href="/about" class="text-[#583E25] px-4 py-2 rounded-full transition-all duration-300 hover:bg-gradient-to-r hover:from-[#FFD0A3] hover:to-[#FFB77A] hover:text-gray-900 hover:scale-105">About us</a></li>
                <li><a href="/orders" class="text-[#583E25] px-4 py-2 rounded-full transition-all duration-300 hover:bg-gradient-to-r hover:from-[#FFD0A3] hover:to-[#FFB77A] hover:text-gray-900 hover:scale-105">Orders</a></li>

            @endif
        @else
            <li><a href="/products" class="text-[#583E25] px-4 py-2 rounded-full transition-all duration-300 hover:bg-gradient-to-r hover:from-[#FFD0A3] hover:to-[#FFB77A] hover:text-gray-900 hover:scale-105">Menu</a></li>
            <li><a href="/offers" class="text-[#583E25] px-4 py-2 rounded-full transition-all duration-300 hover:bg-gradient-to-r hover:from-[#FFD0A3] hover:to-[#FFB77A] hover:text-gray-900 hover:scale-105">Special Offers</a></li>
            <li><a href="/about" class="text-[#583E25] px-4 py-2 rounded-full transition-all duration-300 hover:bg-gradient-to-r hover:from-[#FFD0A3] hover:to-[#FFB77A] hover:text-gray-900 hover:scale-105">About Us</a></li>
        @endif
    </ul>
    
    <div class="pl-18 mr-4 flex items-center gap-4">
        @if($user)
            <!-- Cart button -->
            @if($user->role !== 'admin')
                <a href="/cart" class="hover:text-orange-400 text-xl">🛒</a>
            @endif
            <!-- User Dropdown -->
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="flex items-center text-sm font-medium text-[#583E25] hover:text-gray-700">
                        <div>Hi! {{ $user->name }} ⌄</div>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <!-- Profile Link -->
                    <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

                    <!-- Logout -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit"
                            class="font-montserrat max-w-full text-[#583E25] hover:bg-[#BA4A19] text-sm py-2 px-4 transition duration-300">
                            Logout
                        </button>
                    </form>
                </x-slot>
            </x-dropdown>
        @else
            <a href="/login" 
                class="font-montserrat bg-[#F72C01] hover:bg-[#BA4A19] text-[#FCF9F6] font-semibold py-2 px-4 rounded-full transition-colors duration-300">
                Login
            </a>
        @endif
    </div>
</nav>