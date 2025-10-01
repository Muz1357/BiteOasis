<div class="bg-white p-6 rounded shadow max-w-md mt-4 mb-4">
    <h2 class="text-[#583E25] text-lg font-semibold mb-2">Upload Image for: {{ $product->name }}</h2>

    @if (session('success'))
        <p class="text-green-600 mb-2">{{ session('success') }}</p>
    @endif

    <input type="file" wire:model="photo" accept="image/*" class="mb-3 text-[#583E25]">
    @error('photo') <p class="text-red-600 text-sm">{{ $message }}</p> @enderror

    {{-- Only preview if the file is previewable --}}
    @if ($photo && $photo->isPreviewable())
        <p class="text-sm text-[#583E25] mb-2">Preview:</p>
        <img src="{{ $photo->temporaryUrl() }}" class="rounded mb-3 max-h-48">
    @endif

    <button wire:click="save" class="bg-[#E63946] text-white px-3 py-1 rounded-full hover:bg-[#C53030]">Save</button>

    @if ($product->image_path)
        <div class="mt-4">
            <p class="text-sm text-[#583E25]">Current image:</p>
            <img src="{{ asset('storage/' . $product->image_path) }}" class="rounded max-h-48">
        </div>
    @endif
</div>
