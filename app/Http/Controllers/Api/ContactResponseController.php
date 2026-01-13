<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactResponseController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'contact_id' => 'required|exists:contacts,id',
            'objet' => 'nullable|string',
            'response' => 'required|string',
            'response_date' => 'nullable|date',
            'statut' => 'nullable|in:non_lu,en_cours,traite,non_valide', // Optional status update
        ]);

        // Create the response record
        $response = \App\Models\ContactResponse::create([
            'contact_id' => $validated['contact_id'],
            'objet' => $validated['objet'] ?? null,
            'response' => $validated['response'],
            'response_date' => $validated['response_date'] ?? now(),
        ]);

        // Update contact status if provided
        if (isset($validated['statut'])) {
            $contact = \App\Models\Contact::find($validated['contact_id']);
            $contact->update(['statut' => $validated['statut']]);
        }

        return response()->json([
            'message' => 'Response saved successfully',
            'data' => $response
        ], 201);
    }
}
