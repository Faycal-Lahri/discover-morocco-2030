<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        \Illuminate\Support\Facades\Schema::disableForeignKeyConstraints();
        City::truncate();
        \Illuminate\Support\Facades\Schema::enableForeignKeyConstraints();

        $cities = [
            [
                'nom' => 'Casablanca',
                'titre' => 'The White City',
                'description' => 'Largest city of Morocco, economic capital with the Hassan II Mosque and Atlantic coast. A vibrant hub of culture and commerce.',
                'image' => 'images/cities/casablanca.png',
                'size' => 'big',
                'latitude' => 33.5731,
                'longitude' => -7.5898,
            ],
            [
                'nom' => 'Rabat',
                'titre' => 'The Capital',
                'description' => 'Morocco\'s capital city, resting along the shores of the Bouregreg River and the Atlantic Ocean. Known for landmarks like the Kasbah of the Udayas.',
                'image' => 'images/cities/rabat_vivid.jpg',
                'size' => 'big',
                'latitude' => 34.0209,
                'longitude' => -6.8416,
            ],
            [
                'nom' => 'Marrakech',
                'titre' => 'The Red City',
                'description' => 'A former imperial city in western Morocco, a major economic center and home to mosques, palaces and gardens.',
                'image' => 'images/cities/marrakech.png',
                'size' => 'big',
                'latitude' => 31.6295,
                'longitude' => -7.9811,
            ],
            [
                'nom' => 'Fes',
                'titre' => 'The Spiritual Heart',
                'description' => 'Northeastern Moroccan city often referred to as the country\'s cultural capital. Famous for its fortified Medina of Fes El Bali.',
                'image' => 'images/cities/fes.png',
                'size' => 'small',
                'latitude' => 34.0181,
                'longitude' => -5.0078,
            ],
            [
                'nom' => 'Tangier',
                'titre' => 'Gateway to Africa',
                'description' => 'A Moroccan port on the Strait of Gibraltar, serving as a strategic gateway between Africa and Europe.',
                'image' => 'images/cities/tangier.png',
                'size' => 'big',
                'latitude' => 35.7595,
                'longitude' => -5.8340,
            ],
            [
                'nom' => 'Chefchaouen',
                'titre' => 'The Blue Pearl',
                'description' => 'A city in the Rif Mountains of northwest Morocco. It\'s known for the striking, blue-washed buildings of its old town.',
                'image' => 'images/cities/chefchaouen.png',
                'size' => 'small',
                'latitude' => 35.1688,
                'longitude' => -5.2636,
            ],
            [
                'nom' => 'Merzouga',
                'titre' => 'Gateway to Sahara',
                'description' => 'A small village in the Sahara Desert, gateway to the Erg Chebbi dunes. Known for camel treks and starry nights.',
                'image' => 'images/cities/merzouga.png',
                'size' => 'small',
                'latitude' => 31.0801,
                'longitude' => -4.0133,
            ],
            [
                'nom' => 'Essaouira',
                'titre' => 'The Windy City',
                'description' => 'A port city and resort on Morocco\'s Atlantic coast. Its medina (old town) is protected by 18th-century seafront ramparts.',
                'image' => 'images/cities/essaouira.png',
                'size' => 'small',
                'latitude' => 31.5085,
                'longitude' => -9.7595,
            ],
            [
                'nom' => 'Agadir',
                'titre' => 'Sun & Sea',
                'description' => 'A major city in Morocco, on the shore of the Atlantic Ocean near the foot of the Atlas Mountains.',
                'image' => 'images/cities/agadir.png',
                'size' => 'big',
                'latitude' => 30.4278,
                'longitude' => -9.5981,
            ],
            [
                'nom' => 'Ouarzazate',
                'titre' => 'Hollywood of Africa',
                'description' => 'A city south of Morocco\'s High Atlas mountains, known as a gateway to the Sahara Desert.',
                'image' => 'images/cities/ouarzazate.png',
                'size' => 'small',
                'latitude' => 30.9335,
                'longitude' => -6.9370,
            ],
            [
                'nom' => 'Meknes',
                'titre' => 'The Imperial City',
                'description' => 'A city in northern Morocco. It\'s known for its imperial past, with remnants including the massive Bab Mansour gate.',
                'image' => 'images/cities/meknes.png',
                'size' => 'small',
                'latitude' => 33.8935,
                'longitude' => -5.5473,
            ]
        ];

        foreach ($cities as $city) {
            City::create($city);
        }
    }
}
