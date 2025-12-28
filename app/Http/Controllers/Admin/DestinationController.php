<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\City;
use App\Models\DestinationCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
    public function index(Request $request)
    {
        $query = Destination::with(['city', 'categories', 'media']);

        // Search
        if ($request->has('search') && $request->search != '') {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('nom', 'like', "%{$search}%")
                    ->orWhere('titre', 'like', "%{$search}%")
                    ->orWhere('label', 'like', "%{$search}%");
            });
        }

        // Filter by City
        if ($request->has('city_id') && $request->city_id != '') {
            $query->where('city_id', $request->city_id);
        }

        // Filter by Category
        if ($request->has('category') && $request->category != '') {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('categorie', $request->category);
            });
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

        $destinations = $query->paginate(10)->withQueryString();
        $cities = City::orderBy('nom')->get();
        $available_categories = ['touristique', 'côtière', 'montagneuse', 'historique', 'culturelle', 'désertique'];

        if ($request->ajax()) {
            return view('admin.destinations.partials.table', compact('destinations'))->render();
        }

        return view('admin.destinations.index', compact('destinations', 'cities', 'available_categories'));
    }

    public function create()
    {
        $cities = City::orderBy('nom')->get();
        $available_categories = [
            'touristique',
            'côtière',
            'montagneuse',
            'historique',
            'culturelle',
            'désertique'
        ];
        return view('admin.destinations.create', compact('cities', 'available_categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'city_id' => 'required|exists:cities,id',
            'nom' => 'required|string|max:255',
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'label' => 'nullable|string',
            'gps_location' => 'nullable|string',
            'image' => 'nullable|image|max:10240',
            'video' => 'nullable|file|mimetypes:video/mp4,video/avi,video/mpeg|max:51200',
            'categories' => 'nullable|array',
            'categories.*' => 'in:touristique,côtière,montagneuse,historique,culturelle,désertique'
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('destinations/images', 'public');
            $validated['image'] = $path;
        }

        if ($request->hasFile('video')) {
            $path = $request->file('video')->store('destinations/videos', 'public');
            $validated['video'] = $path;
        }

        $destination = Destination::create($validated);

        if ($request->has('categories')) {
            foreach ($request->categories as $category) {
                DestinationCategory::create([
                    'destination_id' => $destination->id,
                    'categorie' => $category
                ]);
            }
        }

        // Handle gallery images upload
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $path = $image->store('destinations/gallery', 'public');
                \App\Models\DestinationImage::create([
                    'destination_id' => $destination->id,
                    'image' => $path,
                    'caption' => $destination->nom . ' - Gallery Image'
                ]);
            }
        }

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination created successfully.');
    }

    public function show(Destination $destination)
    {
        $destination->load(['city', 'categories', 'media']);
        return view('admin.destinations.show', compact('destination'));
    }

    public function edit(Destination $destination)
    {
        // Load the destination images relationship
        $destination->load('destinationImages');

        $cities = City::orderBy('nom')->get();
        $available_categories = [
            'touristique',
            'côtière',
            'montagneuse',
            'historique',
            'culturelle',
            'désertique'
        ];
        $current_categories = $destination->categories->pluck('categorie')->toArray();

        return view('admin.destinations.edit', compact('destination', 'cities', 'available_categories', 'current_categories'));
    }

    public function update(Request $request, Destination $destination)
    {
        $validated = $request->validate([
            'city_id' => 'required|exists:cities,id',
            'nom' => 'required|string|max:255',
            'titre' => 'required|string|max:255',
            'description' => 'nullable|string',
            'label' => 'nullable|string',
            'gps_location' => 'nullable|string',
            'image' => 'nullable|image|max:10240',
            'video' => 'nullable|file|mimetypes:video/mp4,video/avi,video/mpeg|max:51200',
            'categories' => 'nullable|array',
            'categories.*' => 'in:touristique,côtière,montagneuse,historique,culturelle,désertique'
        ]);

        if ($request->hasFile('image')) {
            if ($destination->image)
                Storage::disk('public')->delete($destination->image);
            $validated['image'] = $request->file('image')->store('destinations/images', 'public');
        }

        if ($request->hasFile('video')) {
            if ($destination->video)
                Storage::disk('public')->delete($destination->video);
            $validated['video'] = $request->file('video')->store('destinations/videos', 'public');
        }

        $destination->update($validated);

        // Sync categories
        $destination->categories()->delete();
        if ($request->has('categories')) {
            foreach ($request->categories as $category) {
                DestinationCategory::create([
                    'destination_id' => $destination->id,
                    'categorie' => $category
                ]);
            }
        }

        // Handle gallery images upload
        if ($request->hasFile('gallery_images')) {
            foreach ($request->file('gallery_images') as $image) {
                $path = $image->store('destinations/gallery', 'public');
                \App\Models\DestinationImage::create([
                    'destination_id' => $destination->id,
                    'image' => $path,
                    'caption' => $destination->nom . ' - Gallery Image'
                ]);
            }
        }

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination updated successfully.');
    }

    public function destroy(Destination $destination)
    {
        if ($destination->image)
            Storage::disk('public')->delete($destination->image);
        if ($destination->video)
            Storage::disk('public')->delete($destination->video);
        $destination->delete();

        return redirect()->route('admin.destinations.index')
            ->with('success', 'Destination deleted successfully.');
    }

    public function deleteVideo(Destination $destination)
    {
        if ($destination->video) {
            Storage::disk('public')->delete($destination->video);
            $destination->update(['video' => null]);

            return response()->json(['success' => true, 'message' => 'Video deleted successfully.']);
        }

        return response()->json(['success' => false, 'message' => 'No video found.'], 404);
    }
}
