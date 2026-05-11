<?php

namespace App\Http\Controllers;

use App\Models\Campus;
use Illuminate\Http\Request;

class CampusController extends Controller
{
    public function index()
    {
        $campuses = Campus::withCount('properties')->get();
        return view('campuses.index', compact('campuses'));
    }

    public function show(Campus $campus)
    {
        $properties = $campus->properties()
            ->with(['category', 'primaryImage', 'facilities'])
            ->verified()
            ->available()
            ->latest()
            ->paginate(12);

        return view('campuses.show', compact('campus', 'properties'));
    }
}
