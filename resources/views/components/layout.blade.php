<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Writeup Vault' }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-950 text-green-400 font-mono min-h-screen">
<header class="border-b border-green-500/30">
    <nav class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
        <a href="{{ route('writeups.index') }}" class="text-xl font-bold">
            <span class="text-green-600">root@vault:~$</span> writeups<span class="animate-pulse">_</span>
        </a>

        <div class="flex items-center gap-4 text-sm">
            @auth
                <span class="text-green-600">{{ auth()->user()->name }}</span>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="hover:text-green-200">logout</button>
                </form>
            @endauth

            @guest
                <a href="{{ route('login') }}" class="hover:text-green-200">login</a>
                <a href="{{ route('register') }}" class="hover:text-green-200">register</a>
            @endguest
        </div>
    </nav>
</header>

<main class="max-w-6xl mx-auto px-4 py-8">
    @if (session('success'))
        <div x-data="{ show: true }" x-show="show"
             class="mb-6 flex items-center justify-between border border-green-500 bg-green-950 rounded p-4">
            <span>{{ session('success') }}</span>
            <button @click="show = false" class="ml-4 text-green-300 hover:text-white">&times;</button>
        </div>
    @endif

    {{ $slot }}
</main>
</body>
</html>
