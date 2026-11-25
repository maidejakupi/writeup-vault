<x-layout>
    <x-slot:title>Profile</x-slot:title>

    <div class="max-w-md mx-auto bg-gray-900 border border-green-500/30 rounded-lg p-8">
        <h1 class="text-2xl font-bold mb-6">Profile</h1>

        <form method="POST" action="{{ route('profile.update') }}" class="space-y-4">
            @csrf
            @method('PUT')

            <div>
                <label for="name" class="block text-sm mb-1">Name</label>
                <input id="name" name="name" type="text" value="{{ old('name', $user->name) }}"
                       class="w-full bg-gray-950 border border-green-500/40 rounded px-3 py-2 focus:outline-none focus:border-green-400">
                @error('name') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="email" class="block text-sm mb-1">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email', $user->email) }}"
                       class="w-full bg-gray-950 border border-green-500/40 rounded px-3 py-2 focus:outline-none focus:border-green-400">
                @error('email') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password" class="block text-sm mb-1">New password <span class="text-green-700">(leave empty to keep the current one)</span></label>
                <input id="password" name="password" type="password"
                       class="w-full bg-gray-950 border border-green-500/40 rounded px-3 py-2 focus:outline-none focus:border-green-400">
                @error('password') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password_confirmation" class="block text-sm mb-1">Confirm new password</label>
                <input id="password_confirmation" name="password_confirmation" type="password"
                       class="w-full bg-gray-950 border border-green-500/40 rounded px-3 py-2 focus:outline-none focus:border-green-400">
            </div>

            <button type="submit"
                    class="w-full border border-green-500 rounded py-2 hover:bg-green-500 hover:text-gray-950 transition">
                Save profile
            </button>
        </form>
    </div>
</x-layout>
