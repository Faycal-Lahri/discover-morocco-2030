<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Volontaire;

class VolunteerController extends Controller
{
    public function store(Request $request)
    {
        // dd($request->all());
        $validated = $request->validate([
            'prenom' => 'required|string|max:255',
            'nom' => 'required|string|max:255',
            'date_naissance' => 'required|date',
            'identite' => 'required|string|max:50', // CIN/Passport
            'email' => 'required|email|max:255',
            'telephone' => 'required|string|max:20',
            'pays' => 'required|string|max:100',
            'ville' => 'required|string|max:100',
            'adresse' => 'required|string|max:500',
            'ville_volontariat' => 'required|string',
            'niveau_etudes' => 'required|string',
            'langues' => 'nullable|array',
            'disponibilite' => 'required|string',
            'cv' => 'nullable|file|mimes:pdf,docx,doc|max:5120', // 5MB
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // 2MB
        ]);

        // Handle File Uploads
        if ($request->hasFile('cv')) {
            $validated['cv'] = $request->file('cv')->store('volunteers/cv', 'public');
        }

        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('volunteers/photos', 'public');
        }
        
        // Competences is not in form, set default or null
        $validated['competences'] = 'N/A';

        Volontaire::create($validated);

        return back()->with('success', 'Application Received! We will contact you soon.');
    }
}
