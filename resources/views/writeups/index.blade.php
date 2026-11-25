<x-layout>
    <x-slot:title>All Writeups</x-slot:title>

    <h1 class="text-3xl font-bold mb-6">All Writeups</h1>

    <form method="GET" action="{{ route('writeups.index') }}"
          class="mb-8 grid gap-3 md:grid-cols-5">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="search title..."
               class="md:col-span-2 bg-gray-900 border border-green-500/40 rounded px-3 py-2 focus:outline-none focus:border-green-400">

        <select name="category"
                class="bg-gray-900 border border-green-500/40 rounded px-3 py-2 focus:outline-none focus:border-green-400">
            <option value="">All categories</option>
            @foreach (\App\Models\Writeup::CATEGORIES as $category)
                <option value="{{ $category }}" @selected(request('category') === $category)>{{ $category }}</option>
            @endforeach
        </select>

        <select name="difficulty"
                class="bg-gray-900 border border-green-500/40 rounded px-3 py-2 focus:outline-none focus:border-green-400">
            <option value="">All difficulties</option>
            @foreach (\App\Models\Writeup::DIFFICULTIES as $difficulty)
                <option value="{{ $difficulty }}" @selected(request('difficulty') === $difficulty)>{{ $difficulty }}</option>
            @endforeach
        </select>

        <select name="platform"
                class="bg-gray-900 border border-green-500/40 rounded px-3 py-2 focus:outline-none focus:border-green-400">
            <option value="">All platforms</option>
            @foreach (\App\Models\Writeup::PLATFORMS as $platform)
                <option value="{{ $platform }}" @selected(request('platform') === $platform)>{{ $platform }}</option>
            @endforeach
        </select>

        <div class="md:col-span-5 flex gap-3">
            <button type="submit"
                    class="border border-green-500 rounded px-5 py-2 text-sm hover:bg-green-500 hover:text-gray-950 transition">
                Filter
            </button>
            <a href="{{ route('writeups.index') }}"
               class="border border-green-900 text-green-700 rounded px-5 py-2 text-sm hover:text-green-400 transition">
                Reset
            </a>
        </div>
    </form>

    <div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
        @forelse ($writeups as $writeup)
            <x-writeup-card :writeup="$writeup" />
        @empty
            <p class="text-green-700 md:col-span-3">No writeups match your filters.</p>
        @endforelse
    </div>

    <div class="mt-8">
        {{ $writeups->links() }}
    </div>
</x-layout>
