@props(['writeup'])

<a href="{{ route('writeups.show', $writeup) }}"
   class="block bg-gray-900 border border-green-500/30 rounded-lg p-5 hover:border-green-400 hover:-translate-y-0.5 transition">
    <h2 class="text-lg font-semibold text-green-300">{{ $writeup->title }}</h2>

    <div class="mt-2 flex flex-wrap gap-2">
        <span class="px-2 py-1 text-xs border border-cyan-500 text-cyan-400 rounded">{{ $writeup->category }}</span>
        <x-difficulty-badge :level="$writeup->difficulty" />
        <span class="px-2 py-1 text-xs border border-purple-500 text-purple-400 rounded">{{ $writeup->platform }}</span>
    </div>

    <p class="mt-3 text-sm text-green-500/80">{{ str($writeup->body)->limit(100) }}</p>

    <div class="mt-4 flex items-center gap-2 text-xs text-green-700">
        <span class="flex h-6 w-6 items-center justify-center rounded-full border border-green-500/50 text-green-400">
            {{ strtoupper(substr($writeup->user->name, 0, 1)) }}
        </span>
        <span>{{ $writeup->user->name }}</span>
        <span>&middot; {{ $writeup->reading_time }} min read</span>
    </div>
</a>
