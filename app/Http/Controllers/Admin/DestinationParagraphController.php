<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DestinationParagraph;
use App\Models\Destination;
use App\Models\City;
use Illuminate\Http\Request;

class DestinationParagraphController extends Controller
{
    public function index(Request $request)
    {
        $query = DestinationParagraph::with('destination.city');

        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('titre', 'like', "%{$search}%")
                  ->orWhere('contenu', 'like', "%{$search}%")
                  ->orWhereHas('destination', function($q) use ($search) {
                      $q->where('nom', 'like', "%{$search}%")
                        ->orWhereHas('city', function($q) use ($search) {
                            $q->where('nom', 'like', "%{$search}%");
                        });
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
            return view('admin.destination-paragraphs.partials.table', compact('paragraphs'))->render();
        }

        return view('admin.destination-paragraphs.index', compact('paragraphs'));
    }

    public function create()
    {
        $cities = City::orderBy('nom')->get();
        $destinations = Destination::with('city')->orderBy('nom')->get();
        return view('admin.destination-paragraphs.create', compact('destinations', 'cities'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'titre' => 'nullable|string|max:255',
            'contenu' => 'required|string',
        ]);

        $destination = Destination::find($validated['destination_id']);
        if ($destination->paragraphs()->count() >= 1) {
             return back()->with('error', 'Destinations can only have 1 content block.')->withInput();
        }

        DestinationParagraph::create($validated);

        return redirect()->route('admin.destination-paragraphs.index')
            ->with('success', 'Destination paragraph created successfully.');
    }

    public function edit(DestinationParagraph $destinationParagraph)
    {
        $cities = City::orderBy('nom')->get();
        $destinations = Destination::with('city')->orderBy('nom')->get();
        return view('admin.destination-paragraphs.edit', compact('destinationParagraph', 'destinations', 'cities'));
    }

    public function update(Request $request, DestinationParagraph $destinationParagraph)
    {
        $validated = $request->validate([
            'destination_id' => 'required|exists:destinations,id',
            'titre' => 'nullable|string|max:255',
            'contenu' => 'required|string',
        ]);

        $destinationParagraph->update($validated);

        return redirect()->route('admin.destination-paragraphs.index')
            ->with('success', 'Destination paragraph updated successfully.');
    }

    public function destroy(DestinationParagraph $destinationParagraph)
    {
        $destinationParagraph->delete();

        return redirect()->route('admin.destination-paragraphs.index')
            ->with('success', 'Destination paragraph deleted successfully.');
    }
}
