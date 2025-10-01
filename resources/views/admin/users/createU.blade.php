<x-layout>
    <h1 class="text-[#583E25] text-5xl font-bold mb-4 font-allura text-center">Add User</h1>

    <form action="{{ route('admin.users.store') }}" method="POST" class="space-y-4">
        @csrf
        <input type="text" name="name" value="{{ old('name') }}"
            placeholder="Full Name" class="text-[#583E25] w-full border border-black p-2 rounded-xl">

        <input type="email" name="email" value="{{ old('email') }}"
            placeholder="Email Address" class="text-[#583E25] w-full border border-black p-2 rounded-xl">

        <input type="text" name="contact_info" value="{{ old('contact_info') }}"
            placeholder="Contact Info" class="text-[#583E25] w-full border border-black p-2 rounded-xl">

        <select name="role" class="text-[#583E25] w-full border border-black p-2 rounded-xl">
            <option value="customer" {{ old('role') == 'customer' ? 'selected' : '' }}>Customer</option>
            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
        </select>

        <input type="password" name="password"
            placeholder="Password" class="text-[#583E25] w-full border border-black p-2 rounded-xl">

        <input type="password" name="password_confirmation"
            placeholder="Confirm Password" class="txet-[#583E25] w-full border border-black p-2 rounded-xl">

        <button type="submit" class="bg-[#E63946] text-white px-4 py-2 rounded-full hover:bg-[#C53030]">Add User</button>
    </form>

    @error('name') <div class="text-red-500">{{ $message }}</div> @enderror
    @error('email') <div class="text-red-500">{{ $message }}</div> @enderror
    @error('contact_info') <div class="text-red-500">{{ $message }}</div> @enderror
    @error('role') <div class="text-red-500">{{ $message }}</div> @enderror
    @error('password') <div class="text-red-500">{{ $message }}</div> @enderror
</x-layout>