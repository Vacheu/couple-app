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

class SpeciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $response = Http::get('https://ghibliapi.vercel.app/species');

        foreach ($response->json() as $speciesData) {
            $species = Species::create([
                'id' => $speciesData['id'],
                'name' => $speciesData['name'],
                'classification' => $speciesData['classification'],
                'eye_colors' => $speciesData['eye_colors'],
                'hair_colors' => $speciesData['hair_colors'],

            ]);
    }
}
}
