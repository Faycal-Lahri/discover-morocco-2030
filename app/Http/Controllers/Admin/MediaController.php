<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MediaController extends Controller
{
    public function index(Request $request)
    {
        // 1. Common Data for Filters
        $cities = \App\Models\City::orderBy('nom')->get();
        // Pass all destinations with city_id for JS filtering
        $allDestinations = \App\Models\Destination::select('id', 'nom', 'city_id')->orderBy('nom')->get();

        // 2. Filter Logic (Apply to both Dashboard and See All)
        $cityId = $request->city_id;
        $destinationId = $request->destination_id;
        $section = $request->section; // 'city_images', 'city_videos', 'destination_images', 'destination_videos'

        // 3. Handle "See All" View
        if ($section) {
            $items = collect();
            $title = '';

            if (in_array($section, ['city_images', 'city_videos'])) {
                $type = str_contains($section, 'images') ? 'image' : 'video';
                $title = str_contains($section, 'images') ? 'City Pictures' : 'City Videos';
                
                $query = \App\Models\City::query()->orderBy('nom');
                
                if ($cityId) {
                    $query->where('id', $cityId);
                }

                // Eager load only relevant media
                $query->with(['media' => function($q) use ($type) {
                    $q->where('file_type', $type)->latest();
                }]);

                if (!$cityId) {
                    $query->whereHas('media', function($q) use ($type) {
                        $q->where('file_type', $type);
                    });
                }
                
                $items = $query->get();

            } elseif (in_array($section, ['destination_images', 'destination_videos'])) {
                $type = str_contains($section, 'images') ? 'image' : 'video';
                $title = str_contains($section, 'images') ? 'Destination Pictures' : 'Destination Videos';

                $query = \App\Models\Destination::query()->orderBy('nom')->with('city');

                if ($cityId) {
                    $query->where('city_id', $cityId);
                }
                if ($destinationId) {
                    $query->where('id', $destinationId);
                }

                $query->with(['media' => function($q) use ($type) {
                    $q->where('file_type', $type)->latest();
                }]);
                
                if (!$destinationId && !$cityId) {
                     $query->whereHas('media', function($q) use ($type) {
                        $q->where('file_type', $type);
                    });
                }

                $items = $query->get();
            }

            return view('admin.media.see_all', compact(
                'items', 'section', 'title', 'cities', 'allDestinations', 'cityId', 'destinationId'
            ));
        }

        // 4. Dashboard View (Standard Overview)
        $query = Media::with('mediable')->has('mediable')->latest();

        if ($cityId) {
            // Get media for the city AND its destinations
            $query->where(function($q) use ($cityId) {
                $q->where(function($sub) use ($cityId) {
                    $sub->where('mediable_type', 'App\Models\City')
                        ->where('mediable_id', $cityId);
                })->orWhere(function($sub) use ($cityId) {
                    $sub->where('mediable_type', 'App\Models\Destination')
                        ->whereHasMorph('mediable', ['App\Models\Destination'], function($q) use ($cityId) {
                            $q->where('city_id', $cityId);
                        });
                });
            });
        }

        if ($destinationId) {
            $query->where('mediable_type', 'App\Models\Destination')
                  ->where('mediable_id', $destinationId);
        }

        $mediaItems = $query->get();

        $cityImages = $mediaItems->where('mediable_type', 'App\Models\City')->where('file_type', 'image');
        $cityVideos = $mediaItems->where('mediable_type', 'App\Models\City')->where('file_type', 'video');
        $destinationImages = $mediaItems->where('mediable_type', 'App\Models\Destination')->where('file_type', 'image');
        $destinationVideos = $mediaItems->where('mediable_type', 'App\Models\Destination')->where('file_type', 'video');

        // Pass simple destinations for the blade (filtered by PHP if needed, but JS will handle interactivity)
        $destinations = $cityId ? $allDestinations->where('city_id', $cityId) : $allDestinations;

        if ($request->ajax()) {
            return view('admin.media.partials.gallery', compact('cityImages', 'cityVideos', 'destinationImages', 'destinationVideos', 'cities', 'destinations'))->render();
        }

        return view('admin.media.index', compact('cityImages', 'cityVideos', 'destinationImages', 'destinationVideos', 'cities', 'destinations', 'allDestinations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|file|max:51200', // 50MB max
            'model_type' => 'required|string',
            'model_id' => 'required|integer',
            'type' => 'required|in:image,video',
        ]);

        $modelClass = $request->model_type;
        if (!class_exists($modelClass)) {
            return back()->with('error', 'Invalid model type.');
        }
        
        $model = $modelClass::findOrFail($request->model_id);

        $path = $request->file('file')->store('media', 'public');

        $media = new Media();
        $media->file_path = $path;
        $media->file_type = $request->type;
        $media->mediable_type = $modelClass;
        $media->mediable_id = $model->id;
        $media->save();

        return back()->with('success', 'Media uploaded successfully.');
    }

    public function destroy(Media $media)
    {
        if (Storage::disk('public')->exists($media->file_path)) {
            Storage::disk('public')->delete($media->file_path);
        }
        $media->delete();

        return back()->with('success', 'Media deleted successfully.');
    }
}
