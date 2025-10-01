<div class="flex min-h-screen">
    <!-- Left side of the screen -->
    <div class="hidden lg:flex w-1/2 bg-cover bg-center relative" 
        style="background-image: url('{{ asset('Images/login-left.jpeg') }}');">
        <div class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center">
            <div class="text-center text-white p-6">
                <h1 class="[font-family:'Bebas Neue',cursive] text-[55px] font-bold mb-4">BiteOasis</h1>
                <p class="text-[30px]">Taste the world, one bite at a time</p>
            </div>
        </div>
    </div>

    <!--Right side of the screen-->
    <div class="flex w-full lg:w-1/2 justify-center items-center p-8 bg-cover bg-center"
        style="background-image: url('{{ asset('Images/login-right.png') }}');">
        
        <div class="w-full max-w-md bg-white shadow-md rounded-lg px-6 py-8">
            {{ $slot }}
        </div>
    </div>

</div>
