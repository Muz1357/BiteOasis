<tr>
    <td class="border text-center px-4 py-2 border-black">{{ $cartItem->product->name }}</td>
    <td class="border px-4 py-2 gap-2 border-black">
        <div class="flex items-center justify-center gap-2">
            <button wire:click="decrement" class="px-2 py-1 bg-gray-200 rounded">
                -
            </button>
            <span>{{ $quantity }}</span>
            <button wire:click="increment" class="px-2 py-1 bg-gray-200 rounded">
                +
             </button>
        </div>
    </td>

    <td class="border text-center px-4 py-2 border-black">
        LKR {{ number_format($cartItem->product->price * $quantity, 2) }}
    </td>
    <td class="border text-center px-4 py-2 border-black">
        <form action="{{ route('cart.removeC', $cartItem->id) }}" method="POST"
            onsubmit="return confirm('Are you sure you want to remove this item?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="text-red-500 hover:underline">Remove</button>
        </form>
    </td>
</tr>   

