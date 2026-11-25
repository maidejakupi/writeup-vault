@props(['writeup'])

<a href="{{ route('writeups.show', $writeup) }}"
   class="block bg-white rounded-lg shadow p-5 hover:shadow-md transition">
    <h2 class="text-lg font-semibold">{{ $writeup->title }}</h2>

    <div class="mt-2 flex gap-2 text-xs">
        <span class="px-2 py-1 rounded bg-blue-100 text-blue-800">{{ $writeup->category }}</span>
        <span class="px-2 py-1 rounded bg-gray-200">{{ $writeup->difficulty }}</span>
    </div>

    <p class="mt-3 text-sm text-gray-600">{{ str($writeup->body)->limit(100) }}</p>
    <p class="mt-3 text-xs text-gray-500">by {{ $writeup->user->name }}</p>
</a>
