<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $writeups = $request->user()
            ->writeups()
            ->latest()
            ->paginate(6);

        return view('dashboard', compact('writeups'));
    }
}
