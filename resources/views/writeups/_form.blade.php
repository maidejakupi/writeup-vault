<div class="space-y-4">
    <div>
        <label for="title" class="block text-sm mb-1">Title</label>
        <input id="title" name="title" type="text" value="{{ old('title', $writeup->title ?? '') }}"
               class="w-full bg-gray-950 border border-green-500/40 rounded px-3 py-2 focus:outline-none focus:border-green-400">
        @error('title') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
    </div>

    <div class="grid gap-4 md:grid-cols-2">
        <div>
            <label for="category" class="block text-sm mb-1">Category</label>
            <select id="category" name="category"
                    class="w-full bg-gray-950 border border-green-500/40 rounded px-3 py-2 focus:outline-none focus:border-green-400">
                <option value="">Select a category</option>
                @foreach (\App\Models\Writeup::CATEGORIES as $category)
                    <option value="{{ $category }}" @selected(old('category', $writeup->category ?? '') === $category)>
                        {{ $category }}
                    </option>
                @endforeach
            </select>
            @error('category') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
        </div>

        <div>
            <label for="difficulty" class="block text-sm mb-1">Difficulty</label>
            <select id="difficulty" name="difficulty"
                    class="w-full bg-gray-950 border border-green-500/40 rounded px-3 py-2 focus:outline-none focus:border-green-400">
                <option value="">Select a difficulty</option>
                @foreach (\App\Models\Writeup::DIFFICULTIES as $difficulty)
                    <option value="{{ $difficulty }}" @selected(old('difficulty', $writeup->difficulty ?? '') === $difficulty)>
                        {{ $difficulty }}
                    </option>
                @endforeach
            </select>
            @error('difficulty') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
        </div>
    </div>

    <div>
        <label for="body" class="block text-sm mb-1">Writeup</label>
        <textarea id="body" name="body" rows="12"
                  class="w-full bg-gray-950 border border-green-500/40 rounded px-3 py-2 focus:outline-none focus:border-green-400">{{ old('body', $writeup->body ?? '') }}</textarea>
        @error('body') <p class="text-red-400 text-sm mt-1">{{ $message }}</p> @enderror
    </div>
</div>
