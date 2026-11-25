<x-layout>
    <x-slot:title>All Writeups</x-slot:title>

    {{-- Hero: only on the clean home page, not when filtering or paging --}}
    @unless (request()->hasAny(['search', 'category', 'difficulty', 'platform', 'page']))
        <section class="mb-10 border border-green-500/30 rounded-lg bg-gray-900 p-8 md:p-12">
            <p class="text-green-700 text-sm">$ cat README.txt</p>
            <h1 class="mt-2 text-3xl md:text-5xl font-bold text-green-300">
                Your CTF writeups,<br>in one vault<span class="animate-pulse">_</span>
            </h1>
            <p class="mt-4 max-w-2xl text-green-500/80">
                Share how you solved challenges on TryHackMe, HackTheBox and more.
                Browse writeups from other hackers, and keep your own notes in one place.
            </p>

            <div class="mt-6 flex flex-wrap gap-3">
                @guest
                    <a href="{{ route('register') }}"
                       class="border border-green-500 rounded px-5 py-2 text-sm hover:bg-green-500 hover:text-gray-950 transition">
                        Join the vault
                    </a>
                @endguest
                @auth
                    <a href="{{ route('writeups.create') }}"
                       class="border border-green-500 rounded px-5 py-2 text-sm hover:bg-green-500 hover:text-gray-950 transition">
                        + new writeup
                    </a>
                @endauth
            </div>

            <div class="mt-8 grid grid-cols-3 gap-4 max-w-lg text-center">
                <div class="border border-green-500/30 rounded p-3">
                    <p class="text-2xl font-bold text-green-300">{{ $stats['writeups'] }}</p>
                    <p class="text-xs text-green-700">writeups</p>
                </div>
                <div class="border border-green-500/30 rounded p-3">
                    <p class="text-2xl font-bold text-green-300">{{ $stats['authors'] }}</p>
                    <p class="text-xs text-green-700">hackers</p>
                </div>
                <div class="border border-green-500/30 rounded p-3">
                    <p class="text-2xl font-bold text-green-300">{{ $stats['categories'] }}</p>
                    <p class="text-xs text-green-700">categories</p>
                </div>
            </div>
        </section>
    @endunless

    <h2 class="text-3xl font-bold mb-6">All Writeups</h2>

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
