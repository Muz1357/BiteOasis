<x-layout>
    <h2 class="text-center text-5xl font-allura font-bold mb-4 text-[#583E25]">Manage Users</h2>

    <a href="{{ route('admin.users.createU') }}" class="bg-[#F72C01] text-white px-3 py-2 rounded hover:bg-[#D92300]">
        + Add User
    </a>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-4">
        @foreach($users as $user)
            <div class="text-center border border-black p-4 rounded-xl bg-white transition transform hover:-translate-y-1 hover:shadow-lg">
                <h3 class="text-lg font-semibold mb-2 text-[#583E25]">{{ $user->name }}</h3>
                <p class="text-sm font-medium mb-2 text-[#F72C01]">Role: {{ $user->role }}</p>
                <p class="text-sm text-gray mb-6 text-[#7C6F62]">{{ $user->email }}</p>

                <div class="flex items-center justify-center space-x-2">
                    <a href="{{ route('admin.users.editU', $user->id) }}"
                        class="bg-[#3B82F6] text-white px-3 py-1 rounded hover:bg-[#3B82F6]">
                        Edit
                    </a>

                     <form method="POST" action="{{ route('admin.users.destroy', $user->id) }}">
                        @csrf
                        @method('DELETE')
                        <button class="bg-[#E63946] text-white px-3 py-1 rounded hover:bg-[#C53030]" 
                            onclick="return confirm('Are you sure?')">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>
</x-layout>