<x-layout>
    <h1 class="text-center text-5xl font-allura font-bold mb-4 text-[#583E25]">Add Product</h1>

    <form action="{{ route('admin.products.store') }}" method="POST" class="space-y-4" enctype="multipart/form-data">
        @csrf
        <input type="text" name="name" value="{{ old('name') }}"
            placeholder="Product Name" class="text-[#583E25] w-full border border-black p-2 rounded-xl">
        
        <input type="text" name="price" value="{{ old('price') }}"
            placeholder="Product Price" class="text-[#583E25] w-full border border-black p-2 rounded-xl">
        
        <input type="text" name="description" value="{{ old('description') }}"
            placeholder="Product Description" class="text-[#583E25] w-full border border-black p-2 rounded-xl">

        <input type="file" name="image" class="text-[#583E25] w-full border border-black p-2 rounded-xl">

        <button class="bg-[#E63946] text-white px-4 py-2 rounded-full hover:bg-[#C53030]">Add Product</button>
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
</x-layout>