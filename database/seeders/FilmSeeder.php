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

class FilmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $response = Http::get('https://ghibliapi.vercel.app/films');

        foreach ($response->json() as $filmData) {
            $film = Film::create([
                'id' => $filmData['id'],
                'title' => $filmData['title'],
                'original_title' => $filmData['original_title'],
                'original_title_romanised' => $filmData['original_title_romanised'],
                'description' => $filmData['description'],
                'director' => $filmData['director'],
                'producer' => $filmData['producer'],
                'release_date' => $filmData['release_date'],
                'running_time' => $filmData['running_time'],
                'rt_score' => $filmData['rt_score'],
            ]);

            // Relations vers les personnes
            foreach ($filmData['people'] as $personUrl) {
                $id = basename($personUrl);
                if (Person::where('id', $id)->exists()) {
                    $film->people()->attach($id);
                }
            }

            // Relations vers les locations
            /*
            foreach ($filmData['locations'] as $locationUrl) {
                $id = basename($locationUrl);
                if (Location::where('id', $id)->exists()) {
                    $film->locations()->attach($id);
                }
            }
            */

            // Relations vers les species
            foreach ($filmData['species'] as $speciesUrl) {
                $id = basename($speciesUrl);
                if (Species::where('id', $id)->exists()) {
                    $film->species()->attach($id);
                }
            }

            // Relations vers les véhicules
            foreach ($filmData['vehicles'] as $vehicleUrl) {
                $id = basename($vehicleUrl);
                if (Vehicle::where('id', $id)->exists()) {
                    $film->vehicles()->attach($id);
                }
            }
        }
    }



}
