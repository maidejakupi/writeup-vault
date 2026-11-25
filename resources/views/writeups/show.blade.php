<x-layout>
    <x-slot:title>{{ $writeup->title }}</x-slot:title>

    <a href="{{ route('writeups.index') }}" class="text-sm text-cyan-400 hover:underline">
        &larr; cd ..
    </a>

    <article class="mt-4 bg-gray-900 border border-green-500/30 rounded-lg p-8">
        <h1 class="text-3xl font-bold text-green-300">{{ $writeup->title }}</h1>

        <div class="mt-3 flex gap-2">
            <span class="px-2 py-1 text-xs border border-cyan-500 text-cyan-400 rounded">{{ $writeup->category }}</span>
            <x-difficulty-badge :level="$writeup->difficulty" />
        </div>

        <p class="mt-3 text-sm text-green-700">
            author: {{ $writeup->user->name }} &middot; {{ $writeup->created_at->diffForHumans() }}
        </p>

        <div class="mt-6 whitespace-pre-line text-green-400">{{ $writeup->body }}</div>
    </article>
</x-layout>
