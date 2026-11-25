<?php

namespace App\Http\Controllers;

use App\Models\Writeup;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WriteupController extends Controller
{
    public function index(Request $request)
    {
        $writeups = Writeup::with('user')
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('title', 'like', '%' . $request->search . '%');
            })
            ->when($request->filled('category'), fn ($query) => $query->where('category', $request->category))
            ->when($request->filled('difficulty'), fn ($query) => $query->where('difficulty', $request->difficulty))
            ->when($request->filled('platform'), fn ($query) => $query->where('platform', $request->platform))
            ->latest()
            ->paginate(9)
            ->withQueryString();

        return view('writeups.index', compact('writeups'));
    }

    public function create()
    {
        return view('writeups.create');
    }

    public function store(Request $request)
    {
        $validated = $this->validateWriteup($request);

        $writeup = $request->user()->writeups()->create($validated);

        return redirect()->route('writeups.show', $writeup)
            ->with('success', 'Writeup created successfully.');
    }

    public function show(Writeup $writeup)
    {
        return view('writeups.show', compact('writeup'));
    }

    public function edit(Writeup $writeup)
    {
        $this->authorize('update', $writeup);

        return view('writeups.edit', compact('writeup'));
    }

    public function update(Request $request, Writeup $writeup)
    {
        $this->authorize('update', $writeup);

        $validated = $this->validateWriteup($request);

        $writeup->update($validated);

        return redirect()->route('writeups.show', $writeup)
            ->with('success', 'Writeup updated successfully.');
    }

    public function destroy(Writeup $writeup)
    {
        $this->authorize('delete', $writeup);

        $writeup->delete();

        return redirect()->route('writeups.index')
            ->with('success', 'Writeup deleted.');
    }

    private function validateWriteup(Request $request): array
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'category' => ['required', Rule::in(Writeup::CATEGORIES)],
            'difficulty' => ['required', Rule::in(Writeup::DIFFICULTIES)],
            'platform' => ['required', Rule::in(Writeup::PLATFORMS)],
            'body' => 'required|string|min:20',
        ]);
    }
}
