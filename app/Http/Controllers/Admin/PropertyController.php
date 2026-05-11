<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Category;
use App\Models\Campus;
use App\Models\Facility;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::with(['category', 'campus'])->latest()->paginate(15);
        return view('admin.properties.index', compact('properties'));
    }

    public function create()
    {
        $categories = Category::all();
        $campuses = Campus::all();
        $facilities = Facility::all();
        return view('admin.properties.create', compact('categories', 'campuses', 'facilities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'campus_id' => 'nullable|exists:campuses,id',
            'description' => 'required|string',
            'address' => 'required|string|max:500',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'price_monthly' => 'required|integer|min:0',
            'price_yearly' => 'nullable|integer|min:0',
            'owner_name' => 'required|string|max:255',
            'owner_phone' => 'required|string|max:20',
            'is_featured' => 'boolean',
            'is_promo' => 'boolean',
            'status' => 'required|in:available,full,inactive',
            'facilities' => 'array',
            'facilities.*' => 'exists:facilities,id',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $validated['user_id'] = auth()->id();
        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_promo'] = $request->boolean('is_promo');

        $property = Property::create($validated);

        // Attach facilities
        if ($request->has('facilities')) {
            $property->facilities()->attach($request->facilities);
        }

        // Upload images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('properties', 'public');
                $property->images()->create([
                    'image_path' => '/storage/' . $path,
                    'is_primary' => $index === 0,
                    'sort_order' => $index,
                ]);
            }
        }

        return redirect()->route('admin.properties.index')
            ->with('success', 'Hunian berhasil ditambahkan!');
    }

    public function edit(Property $property)
    {
        $property->load('facilities', 'images');
        $categories = Category::all();
        $campuses = Campus::all();
        $facilities = Facility::all();
        return view('admin.properties.edit', compact('property', 'categories', 'campuses', 'facilities'));
    }

    public function update(Request $request, Property $property)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'campus_id' => 'nullable|exists:campuses,id',
            'description' => 'required|string',
            'address' => 'required|string|max:500',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'price_monthly' => 'required|integer|min:0',
            'price_yearly' => 'nullable|integer|min:0',
            'owner_name' => 'required|string|max:255',
            'owner_phone' => 'required|string|max:20',
            'is_featured' => 'boolean',
            'is_promo' => 'boolean',
            'status' => 'required|in:available,full,inactive',
            'facilities' => 'array',
            'facilities.*' => 'exists:facilities,id',
            'images.*' => 'image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $validated['slug'] = Str::slug($validated['name']);
        $validated['is_featured'] = $request->boolean('is_featured');
        $validated['is_promo'] = $request->boolean('is_promo');

        $property->update($validated);

        // Sync facilities
        $property->facilities()->sync($request->input('facilities', []));

        // Upload new images
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $path = $image->store('properties', 'public');
                $property->images()->create([
                    'image_path' => '/storage/' . $path,
                    'is_primary' => false,
                    'sort_order' => $property->images()->count() + $index,
                ]);
            }
        }

        return redirect()->route('admin.properties.index')
            ->with('success', 'Hunian berhasil diupdate!');
    }

    public function destroy(Property $property)
    {
        $property->delete();
        return redirect()->route('admin.properties.index')->with('success', 'Hunian berhasil dihapus.');
    }

    public function verify(Property $property)
    {
        $property->update(['is_verified' => true]);
        return redirect()->route('admin.properties.index')->with('success', 'Hunian berhasil diverifikasi.');
    }
}
