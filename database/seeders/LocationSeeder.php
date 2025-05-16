<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Film;
use App\Models\Person;
use App\Models\Location;
use App\Models\Species;
use App\Models\Vehicle;
use Illuminate\Support\Facades\Http;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $response = Http::get('https://ghibliapi.vercel.app/locations');

        foreach ($response->json() as $locationData) {
            $location = Location::create([
                'id' => $locationData['id'],
                'name' => $locationData['name'],
                'climate' => $locationData['climate'],
                'terrain' => $locationData['terrain'],
                'surface_water' => $locationData['surface_water'],

            ]);

            // Relations vers les locations
            foreach ($locationData['films'] as $filmURL) {
                $filmId = basename($filmURL);
                if (Film::where('id', $filmId)->exists()) {
                    $location->films()->attach($filmId);
                }
            }



        }
    }
}
