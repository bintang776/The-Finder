<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Property;
use App\Models\Category;
use App\Models\Campus;
use App\Models\Article;
use App\Models\Contact;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'properties' => Property::count(),
            'categories' => Category::count(),
            'campuses' => Campus::count(),
            'articles' => Article::count(),
            'contacts_unread' => Contact::where('is_read', false)->count(),
        ];

        $latestProperties = Property::with('category')->latest()->take(5)->get();
        $latestContacts = Contact::where('is_read', false)->latest()->take(5)->get();

        return view('admin.dashboard', compact('stats', 'latestProperties', 'latestContacts'));
    }
}
