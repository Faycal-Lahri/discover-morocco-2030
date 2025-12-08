<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Volontaire;
use Illuminate\Http\Request;

class VolontaireController extends Controller
{
    public function index(Request $request)
    {
        $query = Volontaire::query();

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nom', 'like', "%{$search}%")
                  ->orWhere('prenom', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('ville', 'like', "%{$search}%");
            });
        }

        // Filter by volunteer city
        if ($request->has('volunteer_city') && $request->volunteer_city != '') {
            $query->where('ville_volontariat', 'like', "%{$request->volunteer_city}%");
        }

        // Sorting
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'oldest':
                    $query->oldest();
                    break;
                case 'name_asc':
                    $query->orderBy('nom', 'asc');
                    break;
                case 'name_desc':
                    $query->orderBy('nom', 'desc');
                    break;
                default:
                    $query->latest();
                    break;
            }
        } else {
            $query->latest();
        }

        // Show all volunteers or use a very high pagination limit
        $volontaires = $query->paginate(1000)->withQueryString();

        return view('admin.volontaires.index', compact('volontaires'));
    }

    public function show(Volontaire $volontaire)
    {
        return view('admin.volontaires.show', compact('volontaire'));
    }

    public function edit(Volontaire $volontaire)
    {
        return view('admin.volontaires.edit', compact('volontaire'));
    }

    public function update(Request $request, Volontaire $volontaire)
    {
        $validated = $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'date_naissance' => 'nullable|date',
            'identite' => 'nullable|string|max:255',
            'email' => 'required|email|max:255',
            'telephone' => 'nullable|string|max:20',
            'pays' => 'nullable|string|max:255',
            'ville' => 'nullable|string|max:255',
            'adresse' => 'nullable|string|max:500',
            'ville_volontariat' => 'nullable|string|max:255',
            'langues' => 'nullable|string',
            'niveau_etudes' => 'nullable|string|max:255',
            'competences' => 'nullable|string',
            'disponibilite' => 'nullable|string',
        ]);

        // Convert languages string to array if provided
        if (isset($validated['langues']) && is_string($validated['langues'])) {
            $languesArray = array_map('trim', explode(',', $validated['langues']));
            $languesArray = array_filter($languesArray); // Remove empty values
            $validated['langues'] = !empty($languesArray) ? $languesArray : null;
        }

        $volontaire->update($validated);

        return redirect()->route('admin.volontaires.index')
            ->with('success', 'Volunteer updated successfully.');
    }

    public function destroy(Volontaire $volontaire)
    {
        $volontaire->delete();
        return redirect()->route('admin.volontaires.index')
            ->with('success', 'Volunteer deleted successfully.');
    }
}
