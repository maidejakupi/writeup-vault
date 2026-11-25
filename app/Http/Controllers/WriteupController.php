<?php

namespace App\Http\Controllers;

use App\Models\Writeup;

class WriteupController extends Controller
{
    public function index()
    {
        $writeups = Writeup::with('user')->latest()->paginate(9);

        return view('writeups.index', compact('writeups'));
    }

    public function show(Writeup $writeup)
    {
        return view('writeups.show', compact('writeup'));
    }
}
