<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CityParagraph;
use App\Models\City;
use Illuminate\Http\Request;

class CityParagraphController extends Controller
{
    public function index(Request $request)
    {
        $query = CityParagraph::with('city');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('titre', 'like', "%{$search}%")
                  ->orWhere('contenu', 'like', "%{$search}%")
                  ->orWhereHas('city', function($q) use ($search) {
                      $q->where('nom', 'like', "%{$search}%");
                  });
            });
        }

        // Sorting
        if ($request->has('sort')) {
            switch ($request->sort) {
                case 'oldest':
                    $query->oldest();
                    break;
                case 'title_asc':
                    $query->orderBy('titre', 'asc');
                    break;
                case 'title_desc':
                    $query->orderBy('titre', 'desc');
                    break;
                default:
                    $query->latest();
                    break;
            }
        } else {
            $query->latest();
        }

        $paragraphs = $query->paginate(20)->withQueryString();

        if ($request->ajax()) {
            return view('admin.city-paragraphs.partials.table', compact('paragraphs'))->render();
        }

        return view('admin.city-paragraphs.index', compact('paragraphs'));
    }

    public function create()
    {
        $cities = City::orderBy('nom')->get();
        return view('admin.city-paragraphs.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'city_id' => 'required|exists:cities,id',
            'titre' => 'nullable|string|max:255',
            'contenu' => 'required|string',
        ]);

        $city = City::find($validated['city_id']);
        $count = $city->paragraphs()->count();

        if ($city->size === 'small' && $count >= 3) {
             return back()->with('error', 'Small cities can only have a maximum of 3 content blocks.')->withInput();
        }

        if ($city->size === 'big' && $count >= 5) {
             return back()->with('error', 'Big cities can only have a maximum of 5 content blocks.')->withInput();
        }

        CityParagraph::create($validated);

        return redirect()->route('admin.city-paragraphs.index')
            ->with('success', 'City paragraph created successfully.');
    }

    public function edit(CityParagraph $cityParagraph)
    {
        $cities = City::orderBy('nom')->get();
        return view('admin.city-paragraphs.edit', compact('cityParagraph', 'cities'));
    }

    public function update(Request $request, CityParagraph $cityParagraph)
    {
        $validated = $request->validate([
            'city_id' => 'required|exists:cities,id',
            'titre' => 'nullable|string|max:255',
            'contenu' => 'required|string',
        ]);

        $cityParagraph->update($validated);

        return redirect()->route('admin.city-paragraphs.index')
            ->with('success', 'City paragraph updated successfully.');
    }

    public function destroy(CityParagraph $cityParagraph)
    {
        $cityParagraph->delete();

        return redirect()->route('admin.city-paragraphs.index')
            ->with('success', 'City paragraph deleted successfully.');
    }
}
