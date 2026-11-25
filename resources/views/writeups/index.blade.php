<x-layout>
    <x-slot:title>All Writeups</x-slot:title>

    <h1 class="text-3xl font-bold mb-6">All Writeups</h1>

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @forelse ($writeups as $writeup)
            <x-writeup-card :writeup="$writeup" />
        @empty
            <p>No writeups yet.</p>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $writeups->links() }}
    </div>
</x-layout>
