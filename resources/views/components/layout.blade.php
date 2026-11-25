<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Writeup Vault' }}</title>
    <style>[x-cloak] { display: none !important; }</style>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-950 text-green-400 font-mono min-h-screen flex flex-col">
<header x-data="{ open: false }" class="border-b border-green-500/30">
    <nav class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
        <a href="{{ route('writeups.index') }}" class="text-xl font-bold">
            <span class="text-green-600">root@vault:~$</span> writeups<span class="animate-pulse">_</span>
        </a>

        {{-- Desktop links --}}
        <x-nav-links class="hidden md:flex items-center gap-4 text-sm" />

        {{-- Mobile menu button --}}
        <button type="button" @click="open = !open" aria-label="Toggle menu"
                class="md:hidden border border-green-500/50 rounded px-3 py-1 text-lg">
            <span x-show="!open">&#9776;</span>
            <span x-show="open" x-cloak>&times;</span>
        </button>
    </nav>

    {{-- Mobile links --}}
    <div x-show="open" x-cloak x-transition class="md:hidden border-t border-green-500/30 px-4 py-4">
        <x-nav-links class="flex flex-col gap-3 text-sm" />
    </div>
</header>

<main class="flex-1 w-full max-w-6xl mx-auto px-4 py-8">
    @if (session('success'))
        <div x-data="{ show: true }" x-show="show"
             class="mb-6 flex items-center justify-between border border-green-500 bg-green-950 rounded p-4">
            <span>{{ session('success') }}</span>
            <button @click="show = false" class="ml-4 text-green-300 hover:text-white">&times;</button>
        </div>
    @endif

    {{ $slot }}
</main>

<footer class="border-t border-green-500/30">
    <div class="max-w-6xl mx-auto px-4 py-6 flex flex-col sm:flex-row justify-between gap-2 text-xs text-green-700">
        <p>&copy; {{ date('Y') }} Writeup Vault &middot; built with Laravel</p>
        <p>// share what you learned, hide the flags</p>
    </div>
</footer>
</body>
</html>
