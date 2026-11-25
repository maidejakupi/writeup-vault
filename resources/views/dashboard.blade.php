<x-layout>
    <x-slot:title>Dashboard</x-slot:title>

    <div class="flex items-center justify-between mb-6">
        <div>
            <h1 class="text-3xl font-bold">My Writeups</h1>
            <p class="text-sm text-green-700 mt-1">{{ $writeups->total() }} total</p>
        </div>

        <a href="{{ route('writeups.create') }}"
           class="border border-green-500 rounded px-4 py-2 text-sm hover:bg-green-500 hover:text-gray-950 transition">
            + new writeup
        </a>
    </div>

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @forelse ($writeups as $writeup)
            <x-writeup-card :writeup="$writeup" />
        @empty
            <p class="text-green-700">You haven't posted any writeups yet.</p>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $writeups->links() }}
    </div>
</x-layout>
