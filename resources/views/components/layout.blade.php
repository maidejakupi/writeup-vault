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
    </nav>
</header>

<main class="max-w-6xl mx-auto px-4 py-8">
    {{ $slot }}
</main>
</body>
</html>
