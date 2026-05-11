<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Campus;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CampusController extends Controller
{
    public function index()
    {
        $campuses = Campus::withCount('properties')->latest()->get();
        return view('admin.campuses.index', compact('campuses'));
    }

    public function create()
    {
        return view('admin.campuses.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:500',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        Campus::create($validated);

        return redirect()->route('admin.campuses.index')
            ->with('success', 'Kampus berhasil ditambahkan!');
    }

    public function edit(Campus $campus)
    {
        return view('admin.campuses.edit', compact('campus'));
    }

    public function update(Request $request, Campus $campus)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:500',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $campus->update($validated);

        return redirect()->route('admin.campuses.index')
            ->with('success', 'Kampus berhasil diupdate!');
    }

    public function destroy(Campus $campus)
    {
        $campus->delete();
        return redirect()->route('admin.campuses.index')
            ->with('success', 'Kampus berhasil dihapus!');
    }
}
