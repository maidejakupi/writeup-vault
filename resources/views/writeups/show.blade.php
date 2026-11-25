<x-layout>
    <x-slot:title>{{ $writeup->title }}</x-slot:title>

    <a href="{{ route('writeups.index') }}" class="text-sm text-blue-600 hover:underline">
        &larr; Back to all writeups
    </a>

    <article class="mt-4 bg-white rounded-lg shadow p-8">
        <h1 class="text-3xl font-bold">{{ $writeup->title }}</h1>

        <div class="mt-3 flex gap-2 text-xs">
            <span class="px-2 py-1 rounded bg-blue-100 text-blue-800">{{ $writeup->category }}</span>
            <span class="px-2 py-1 rounded bg-gray-200">{{ $writeup->difficulty }}</span>
        </div>

        <p class="mt-3 text-sm text-gray-500">
            by {{ $writeup->user->name }} &middot; {{ $writeup->created_at->diffForHumans() }}
        </p>

        <div class="mt-6 whitespace-pre-line">{{ $writeup->body }}</div>
    </article>
</x-layout>
