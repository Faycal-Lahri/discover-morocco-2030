<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function show(Destination $destination)
    {
        $destination->load(['paragraphs', 'destinationImages', 'city', 'media']);
        
        // Search for relevant media by name match (e.g. "Tour Hassan" matches files with "tour" or "hassan")
        $nameParts = explode(' ', $destination->nom);
        $searchTerms = array_filter($nameParts, fn($part) => strlen($part) > 2);
        
        $galleryMedia = \App\Models\Media::where(function($query) use ($searchTerms) {
            foreach ($searchTerms as $term) {
                $query->orWhere('file_path', 'like', '%' . $term . '%');
            }
        })
        ->where('file_type', 'like', 'image%')
        ->limit(12)
        ->get();

        // Load some related destinations in the same city
        $relatedDestinations = Destination::where('city_id', $destination->city_id)
            ->where('id', '!=', $destination->id)
            ->take(3)
            ->get();

        return view('destinations.show', compact('destination', 'relatedDestinations', 'galleryMedia'));
    }
}
