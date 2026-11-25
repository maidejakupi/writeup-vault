<x-layout>
    <x-slot:title>{{ $writeup->title }}</x-slot:title>

    <a href="{{ route('writeups.index') }}" class="text-sm text-cyan-400 hover:underline">
        &larr; cd ..
    </a>

    <article class="mt-4 bg-gray-900 border border-green-500/30 rounded-lg p-8">
        <h1 class="text-3xl font-bold text-green-300">{{ $writeup->title }}</h1>

        <div class="mt-3 flex flex-wrap gap-2">
            <span class="px-2 py-1 text-xs border border-cyan-500 text-cyan-400 rounded">{{ $writeup->category }}</span>
            <x-difficulty-badge :level="$writeup->difficulty" />
            <span class="px-2 py-1 text-xs border border-purple-500 text-purple-400 rounded">{{ $writeup->platform }}</span>
        </div>

        <p class="mt-3 text-sm text-green-700">
            author: {{ $writeup->user->name }} &middot; {{ $writeup->created_at->diffForHumans() }}
        </p>

        <div class="mt-6 whitespace-pre-line text-green-400">{{ $writeup->body }}</div>

        @canany(['update', 'delete'], $writeup)
            <div class="mt-8 flex gap-3 border-t border-green-500/20 pt-6">
                @can('update', $writeup)
                    <a href="{{ route('writeups.edit', $writeup) }}"
                       class="border border-cyan-500 text-cyan-400 rounded px-4 py-2 text-sm hover:bg-cyan-500 hover:text-gray-950 transition">
                        Edit
                    </a>
                @endcan

                @can('delete', $writeup)
                    <form method="POST" action="{{ route('writeups.destroy', $writeup) }}"
                          onsubmit="return confirm('Delete this writeup?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                                class="border border-red-500 text-red-400 rounded px-4 py-2 text-sm hover:bg-red-500 hover:text-gray-950 transition">
                            Delete
                        </button>
                    </form>
                @endcan
            </div>
        @endcanany
    </article>
</x-layout>
