<x-layout>
    <x-slot:title>Edit Writeup</x-slot:title>

    <a href="{{ route('writeups.show', $writeup) }}" class="text-sm text-cyan-400 hover:underline">&larr; cd ..</a>

    <div class="mt-4 max-w-3xl bg-gray-900 border border-green-500/30 rounded-lg p-8">
        <h1 class="text-2xl font-bold mb-6">Edit Writeup</h1>

        <form method="POST" action="{{ route('writeups.update', $writeup) }}">
            @csrf
            @method('PUT')
            @include('writeups._form')

            <button type="submit"
                    class="mt-6 border border-green-500 rounded px-6 py-2 hover:bg-green-500 hover:text-gray-950 transition">
                Save changes
            </button>
        </form>
    </div>
</x-layout>
