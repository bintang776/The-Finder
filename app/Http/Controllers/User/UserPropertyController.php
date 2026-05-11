<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Campus;
use App\Models\Facility;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class UserPropertyController extends Controller
{
    public function index()
    {
        $properties = auth()->user()->properties()->with('category')->latest()->paginate(10);
        return view('user.properties.index', compact('properties'));
    }

    public function create()
    {
        $categories = Category::all();
        $campuses = Campus::all();
        $facilities = Facility::all();
        return view('user.properties.create', compact('categories', 'campuses', 'facilities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'campus_id' => 'nullable|exists:campuses,id',
            'description' => 'required|string',
            'address' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'price_monthly' => 'required|numeric|min:0',
            'price_yearly' => 'nullable|numeric|min:0',
            'owner_name' => 'required|string|max:255',
            'owner_phone' => 'required|string|max:255',
            'images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
            'facilities' => 'nullable|array',
            'facilities.*' => 'exists:facilities,id',
        ]);

        $validated['slug'] = Str::slug($validated['name']) . '-' . uniqid();
        $validated['user_id'] = auth()->id();
        $validated['status'] = 'available';
        $validated['is_verified'] = false; // Pending review

        $property = Property::create($validated);

        if ($request->has('facilities')) {
            $property->facilities()->attach($request->facilities);
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('properties', 'public');
                $property->images()->create([
                    'image_path' => '/storage/' . $path,
                    'is_primary' => $index === 0,
                ]);
            }
        }

        return redirect()->route('user.properties.index')->with('success', 'Kost berhasil didaftarkan! Menunggu verifikasi admin.');
    }
}
