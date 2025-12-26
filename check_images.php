<?php

use App\Models\DestinationImage;

require __DIR__ . '/vendor/autoload.php';

$app = require_once __DIR__ . '/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "=== DESTINATION IMAGES DATABASE REPORT ===\n\n";

$total = DestinationImage::count();
echo "📊 Total images in database: $total\n\n";

if ($total > 0) {
    echo "🔍 Latest 5 images:\n";
    echo str_repeat("-", 80) . "\n";

    $latest = DestinationImage::with('destination')
        ->latest()
        ->take(5)
        ->get();

    foreach ($latest as $img) {
        echo "ID: {$img->id}\n";
        echo "Destination: " . ($img->destination ? $img->destination->nom : 'N/A') . "\n";
        echo "Image Path: {$img->image}\n";
        echo "Caption: {$img->caption}\n";
        echo "Created: {$img->created_at}\n";
        echo str_repeat("-", 80) . "\n";
    }
}

echo "\n✅ All images are stored in the 'destination_images' table\n";
echo "✅ Image files are stored in 'storage/app/public/destinations/gallery/'\n";
