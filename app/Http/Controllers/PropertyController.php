<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Category;
use App\Models\Campus;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index(Request $request)
    {
        $query = Property::with(['category', 'campus', 'primaryImage', 'facilities'])
            ->verified()
            ->available();

        // Search
        if ($request->filled('q')) {
            $search = $request->q;
            $query->where(function ($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('address', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%");
            });
        }

        // Filter by category
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Filter by campus
        if ($request->filled('campus')) {
            $query->whereHas('campus', function ($q) use ($request) {
                $q->where('slug', $request->campus);
            });
        }

        // Filter by price range
        if ($request->filled('min_price')) {
            $query->where('price_monthly', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price_monthly', '<=', $request->max_price);
        }

        // Sort
        $sort = $request->get('sort', 'latest');
        switch ($sort) {
            case 'price_asc':
                $query->orderBy('price_monthly', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price_monthly', 'desc');
                break;
            default:
                $query->latest();
                break;
        }

        $properties = $query->paginate(12)->withQueryString();
        $categories = Category::all();
        $campuses = Campus::all();

        return view('properties.index', compact('properties', 'categories', 'campuses'));
    }

    public function show(Property $property)
    {
        if (!$property->is_verified || $property->status !== 'available') {
            abort(404);
        }

        $property->load(['category', 'campus', 'images', 'facilities']);

        $relatedProperties = Property::with(['primaryImage', 'category'])
            ->verified()
            ->available()
            ->where('id', '!=', $property->id)
            ->where(function ($q) use ($property) {
                $q->where('category_id', $property->category_id)
                  ->orWhere('campus_id', $property->campus_id);
            })
            ->take(4)
            ->get();

        return view('properties.show', compact('property', 'relatedProperties'));
    }
}
