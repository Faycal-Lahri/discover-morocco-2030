<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use App\Models\Destination;
use App\Models\CityImage;
use App\Models\DestinationImage;

class ImageSeeder extends Seeder
{
    public function run(): void
    {
        // Clear existing images
        CityImage::truncate();
        DestinationImage::truncate();

        // Get all cities and insert their main images
        $cities = City::all();
        foreach ($cities as $city) {
            if ($city->image) {
                CityImage::create([
                    'city_id' => $city->id,
                    'image' => $city->image,
                    'caption' => $city->nom . ' - ' . $city->titre
                ]);
            }
        }

        // Get all destinations and insert their images
        $destinations = Destination::all();
        foreach ($destinations as $destination) {
            if ($destination->image) {
                DestinationImage::create([
                    'destination_id' => $destination->id,
                    'image' => $destination->image,
                    'caption' => $destination->nom . ' in ' . $destination->city->nom
                ]);
            }
        }

        $this->command->info('✓ Successfully seeded ' . CityImage::count() . ' city images');
        $this->command->info('✓ Successfully seeded ' . DestinationImage::count() . ' destination images');
    }
}
