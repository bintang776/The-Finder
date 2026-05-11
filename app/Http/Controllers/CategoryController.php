<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function show(Category $category)
    {
        $properties = $category->properties()
            ->with(['campus', 'primaryImage', 'facilities'])
            ->verified()
            ->available()
            ->latest()
            ->paginate(12);

        return view('categories.show', compact('category', 'properties'));
    }
}
