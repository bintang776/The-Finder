<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function create()
    {
        return view('about');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'nullable|email|max:255',
            'kost_name' => 'required|string|max:255',
            'kost_address' => 'required|string|max:500',
            'message' => 'required|string|max:2000',
        ]);

        Contact::create($validated);

        return redirect()->route('about')
            ->with('success', 'Terima kasih! Pendaftaran kost Anda telah kami terima. Tim kami akan segera menghubungi Anda.');
    }
}
