<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nom_prenom' => 'required|string|max:255',
            'telephone' => 'nullable|string|max:20',
            'email' => 'required|email|max:255',
            'objet' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        $validated['statut'] = 'non_lu'; // Default status

        Contact::create($validated);

        return back()->with('success', 'Message Sent! We will get back to you shortly.');
    }
}
