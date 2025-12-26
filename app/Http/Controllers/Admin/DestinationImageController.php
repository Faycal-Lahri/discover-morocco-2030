<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DestinationImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestinationImageController extends Controller
{
    public function destroy(DestinationImage $destinationImage)
    {
        // Delete the file from storage
        if ($destinationImage->image && !str_starts_with($destinationImage->image, 'http')) {
            if (str_starts_with($destinationImage->image, 'destinations/') || str_starts_with($destinationImage->image, 'cities/')) {
                Storage::disk('public')->delete($destinationImage->image);
            }
        }

        // Delete the database record
        $destinationImage->delete();

        return response()->json(['success' => true]);
    }
}
