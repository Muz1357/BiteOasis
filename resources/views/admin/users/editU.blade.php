<x-layout>
    <h1 class="text-center text-5xl font-allura font-bold mb-4 text-[#583E25]">Edit User</h1>

    <form action="{{ route('admin.users.update', $user->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <!-- Name -->
        <input type="text" name="name" value="{{ old('name', $user->name) }}"
            placeholder="Full Name" class="text-[#583E25] w-full border p-2 rounded-xl">

        <!-- Email -->
        <input type="email" name="email" value="{{ old('email', $user->email) }}"
            placeholder="Email Address" class="text-[#583E25] w-full border p-2 rounded-xl">

        <!-- Contact Info -->
        <input type="text" name="contact_info" value="{{ old('contact_info', $user->contact_info) }}"
            placeholder="Contact Info" class="text-[#583E25] w-full border p-2 rounded-xl">

        <!-- Role -->
        <select name="role" class="text-[#583E25] w-full border p-2 rounded-xl">
            <option value="customer" {{ old('role', $user->role) == 'customer' ? 'selected' : '' }}>Customer</option>
            <option value="admin" {{ old('role', $user->role) == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>

        <!-- Password (optional) -->
        <input type="password" name="password"
            placeholder="New Password (leave blank to keep current)" class="text-[#583E25] w-full border p-2 rounded-xl">

        <input type="password" name="password_confirmation"
            placeholder="Confirm Password" class="text-[#583E25] w-full border p-2 rounded-xl">

        <button type="submit" class="bg-[#E63946] text-white px-4 py-2 rounded-full hover:bg-[#C53030]">Update User</button>
    </form>

    <!-- Validation errors -->
    @error('name') <div class="text-red-500">{{ $message }}</div> @enderror
    @error('email') <div class="text-red-500">{{ $message }}</div> @enderror
    @error('contact_info') <div class="text-red-500">{{ $message }}</div> @enderror
    @error('role') <div class="text-red-500">{{ $message }}</div> @enderror
    @error('password') <div class="text-red-500">{{ $message }}</div> @enderror
</x-layout>
