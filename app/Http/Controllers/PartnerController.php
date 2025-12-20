<?php

namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\City;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class PartnerController extends Controller
{
    public function contentHub(Request $request)
    {
        // 1. Core Data
        $cities = City::orderBy('nom')->get();
        $allDestinations = Destination::select('id', 'nom', 'city_id')->orderBy('nom')->get();

        // 2. Filter Inputs
        $cityId = $request->city_id;
        $destinationId = $request->destination_id;
        $type = $request->type; // 'image', 'video'

        // 3. Initialize Collection
        $allContent = collect();

        // --- SOURCE A: Main Media Table ---
        $mediaQuery = Media::with('mediable')->has('mediable')->latest();

        if ($cityId) {
            $mediaQuery->where(function($q) use ($cityId) {
                $q->where(function($sub) use ($cityId) {
                    $sub->where('mediable_type', 'App\Models\City')
                        ->where('mediable_id', $cityId);
                })->orWhere(function($sub) use ($cityId) {
                    $sub->where('mediable_type', 'App\Models\Destination')
                        ->whereHasMorph('mediable', ['App\Models\Destination'], function($destQ) use ($cityId) {
                            $destQ->where('city_id', $cityId);
                        });
                });
            });
        }
        if ($destinationId) {
            $mediaQuery->where('mediable_type', 'App\Models\Destination')
                  ->where('mediable_id', $destinationId);
        }
        if ($type) {
             $mediaQuery->where('file_type', $type);
        }
        $mediaQuery->whereIn('file_type', ['image', 'video']);
        
        $mediaItems = $mediaQuery->get()->map(function ($item) {
             return (object)[
                'type' => $item->file_type,
                'url' => Storage::url($item->file_path),
                'thumbnail' => $item->file_type == 'image' ? Storage::url($item->file_path) : null, // Logic for video thumb could be added
                'title' => $item->mediable->nom ?? 'Unknown',
                'category' => class_basename($item->mediable_type),
                'source' => 'Gallery',
                'date' => $item->created_at
             ];
        });
        $allContent = $allContent->merge($mediaItems);


        // --- SOURCE B: Cities Table (Cover Images/Videos) ---
        // Only fetch if no specific destination selected (since cities are parent)
        if (!$destinationId) {
            $cityQuery = City::query();
            if ($cityId) {
                $cityQuery->where('id', $cityId);
            }
            $cityResults = $cityQuery->get();

            foreach ($cityResults as $city) {
                // Image
                if ((!$type || $type == 'image') && $city->image) {
                    $allContent->push((object)[
                        'type' => 'image',
                        'url' => filter_var($city->image, FILTER_VALIDATE_URL) ? $city->image : Storage::url($city->image),
                        'thumbnail' => filter_var($city->image, FILTER_VALIDATE_URL) ? $city->image : Storage::url($city->image),
                        'title' => $city->nom,
                        'category' => 'City',
                        'source' => 'Cover',
                        'date' => $city->created_at
                    ]);
                }
                // Video
                if ((!$type || $type == 'video') && $city->video) {
                    $allContent->push((object)[
                        'type' => 'video',
                        'url' => filter_var($city->video, FILTER_VALIDATE_URL) ? $city->video : Storage::url($city->video),
                        'thumbnail' => null, 
                        'title' => $city->nom,
                        'category' => 'City',
                        'source' => 'Cover',
                        'date' => $city->created_at
                    ]);
                }
            }
        }


        // --- SOURCE C: Destinations Table (Cover Images/Videos) ---
        $destQuery = Destination::with('city');
        if ($cityId) {
            $destQuery->where('city_id', $cityId);
        }
        if ($destinationId) {
            $destQuery->where('id', $destinationId);
        }
        $destResults = $destQuery->get();

        foreach ($destResults as $dest) {
             // Image
            if ((!$type || $type == 'image') && $dest->image) {
                $allContent->push((object)[
                    'type' => 'image',
                    'url' => filter_var($dest->image, FILTER_VALIDATE_URL) ? $dest->image : Storage::url($dest->image),
                    'thumbnail' => filter_var($dest->image, FILTER_VALIDATE_URL) ? $dest->image : Storage::url($dest->image),
                    'title' => $dest->nom,
                    'category' => 'Destination',
                    'source' => 'Cover',
                    'date' => $dest->created_at
                ]);
            }
             // Video
             if ((!$type || $type == 'video') && $dest->video) {
                $allContent->push((object)[
                    'type' => 'video',
                    'url' => filter_var($dest->video, FILTER_VALIDATE_URL) ? $dest->video : Storage::url($dest->video),
                    'thumbnail' => null,
                    'title' => $dest->nom,
                    'category' => 'Destination',
                    'source' => 'Cover',
                    'date' => $dest->created_at
                ]);
            }
        }

        // 4. Sort & Paginate
        // Sort by date equivalent or shuffle? User usually wants latest.
        // Let's shuffle for "Discovery" feel or latest.
        $sorted = $allContent->sortByDesc('date')->values();
        
        // Manual Pagination
        $perPage = 24;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();
        $currentItems = $sorted->slice(($currentPage - 1) * $perPage, $perPage)->all();
        $paginatedItems = new LengthAwarePaginator($currentItems, $sorted->count(), $perPage, $currentPage, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
            'query' => $request->query(),
        ]);

        if ($request->ajax() || $request->query('mode') == 'partial') {
            return view('partners.partials.hub-grid', compact('paginatedItems'))->render();
        }

        return view('partners.content-hub', compact('paginatedItems', 'cities', 'allDestinations', 'cityId', 'destinationId', 'type'));
    }

    public function tools()
    {
        return view('partners.tools');
    }
}
