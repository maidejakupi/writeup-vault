<?php

namespace App\Http\Controllers;

use App\Models\Writeup;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class WriteupController extends Controller
{
    public function index()
    {
        $writeups = Writeup::with('user')->latest()->paginate(9);

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
            'body' => 'required|string|min:20',
        ]);
    }
}
