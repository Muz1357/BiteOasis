<x-layout>
    <h1 class="text-center text-5xl font-allura font-bold mb-4 text-[#583E25]">Edit Product</h1>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <input type="text" name="name" value="{{ old('name', $product->name) }}"
            placeholder="Product Name" class="text-[#583E25] w-full border border-black p-2 rounded-xl">
        
        <input type="text" name="price" value="{{ old('price', $product->price) }}"
            placeholder="Product Price" class="text-[#583E25] w-full border border-black p-2 rounded-xl">
        
        <input type="text" name="description" value="{{ old('description', $product->description) }}"
            placeholder="Product Description" class="text-[#583E25] w-full border border-black p-2 rounded-xl">
    </form>

    @error('name')
    <div class="text-red-500">{{ $message }}</div>
    @enderror

    @error('price')
        <div class="text-red-500">{{ $message }}</div>
    @enderror

    @error('description')
        <div class="text-red-500">{{ $message }}</div>
    @enderror

    <livewire:product-image-upload :productId="$product->id" />

    <button class="bg-[#E63946] text-white px-4 py-2 rounded-full hover:bg-[#C53030] mt-4">Update Product</button>
</x-layout>