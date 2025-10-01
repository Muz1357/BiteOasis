<x-layout>
    <h2 class="text-2xl font-bold mb-4">
        Products
    </h2>

    <a href="{{ route('admin.products.create') }}"
       class="bg-green-600 text-white px-4 py-2 rounded mb-6 inline-block hover:bg-green-700 transition">
       + Add Product
    </a>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach ($products as $product)
            <div class="bg-orange-50 p-6 rounded-xl shadow-md text-center transition transform hover:-translate-y-1 hover:shadow-lg">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}"
                         alt="{{ $product->name }}"
                         class="w-full h-40 object-cover rounded mb-4">
                @else
                    <div class="w-full h-40 bg-gray-200 rounded mb-4 flex items-center justify-center text-gray-500">
                        No Image
                    </div>
                @endif
                <h3 class="text-lg font-bold text-orange-600 mb-1">{{ $product->name }}</h3>
                <p class="text-gray-700 mb-1">{{ $product->description ?? 'N/A' }}</p>
                <p class="text-orange-600 font-semibold mb-4">LKR {{ number_format($product->price, 0) }}</p>

                <div class="flex justify-center space-x-3">
                    <a href="{{ route('admin.products.edit', $product->id) }}"
                       class="bg-green-500 text-white px-4 py-1 rounded hover:bg-green-600 transition">
                        Edit
                    </a>

                    <form method="POST" action="{{ route('admin.products.destroy', $product->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="bg-red-500 text-white px-4 py-1 rounded hover:bg-red-600 transition"
                                onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>
