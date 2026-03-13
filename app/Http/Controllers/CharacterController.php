<?php

namespace App\Http\Controllers;

use App\Models\Character;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class CharacterController extends Controller
{
    public function index()
    {
        $characters = Character::latest()->get();
        $success = session('success');

        return view('characters.index', compact('characters'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:100',
            'power'    => 'nullable|string|max:150',
            'universe' => 'nullable|string|max:100',
        ]);

        Character::create($validated);

        return redirect()->route('characters.index')
            ->with('success', 'Character created successfully');
    }

    // For exam you can stop here (only Create + Read needed)
    // But bonus: add edit & delete quickly

    public function edit(Character $character)
    {
        return view('characters.edit', compact('character'));
    }

    public function update(Request $request, Character $character)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:100',
            'power'    => 'nullable|string|max:150',
            'universe' => 'nullable|string|max:100',
        ]);

        $character->update($validated);

        return redirect()->route('characters.index')
            ->with('success', 'Character updated successfully');
    }

    public function destroy(Character $character)
    {
        $character->delete();

        return redirect()->route('characters.index')
            ->with('success', 'Character deleted successfully');
    }
}