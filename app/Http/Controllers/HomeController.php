<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Category;
use App\Models\Campus;
use App\Models\Article;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('q');

        $featuredProperties = Property::with(['category', 'campus', 'primaryImage', 'facilities'])
            ->verified()
            ->available()
            ->featured()
            ->latest()
            ->take(6)
            ->get();

        $promoProperties = Property::with(['category', 'campus', 'primaryImage', 'facilities'])
            ->verified()
            ->available()
            ->promo()
            ->latest()
            ->take(6)
            ->get();

        $categories = Category::withCount('properties')->get();
        $campuses = Campus::withCount('properties')->get();

        $latestArticles = Article::published()
            ->latest('published_at')
            ->take(3)
            ->get();

        // If search query exists, redirect to properties listing
        if ($search) {
            return redirect()->route('properties.index', ['q' => $search]);
        }

        return view('home', compact(
            'featuredProperties',
            'promoProperties',
            'categories',
            'campuses',
            'latestArticles'
        ));
    }
}
