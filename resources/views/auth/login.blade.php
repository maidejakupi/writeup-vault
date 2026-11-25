<x-layout>
    <x-slot:title>Login</x-slot:title>

    <div class="max-w-md mx-auto bg-gray-900 border border-green-500/30 rounded-lg p-8">
        <h1 class="text-2xl font-bold mb-6">Login</h1>

        <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf

            <div>
                <label for="email" class="block text-sm mb-1">Email</label>
                <input id="email" name="email" type="email" value="{{ old('email') }}"
                       class="w-full bg-gray-950 border border-green-500/40 rounded px-3 py-2 focus:outline-none focus:border-green-400">
                @error('email') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="password" class="block text-sm mb-1">Password</label>
                <input id="password" name="password" type="password"
                       class="w-full bg-gray-950 border border-green-500/40 rounded px-3 py-2 focus:outline-none focus:border-green-400">
                @error('password') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
            </div>

            <label class="flex items-center gap-2 text-sm">
                <input type="checkbox" name="remember"> Remember me
            </label>

            <button type="submit"
                    class="w-full border border-green-500 rounded py-2 hover:bg-green-500 hover:text-gray-950 transition">
                Login
            </button>
        </form>
    </div>
</x-layout>
