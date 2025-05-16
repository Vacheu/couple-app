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

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $response = Http::get('https://ghibliapi.vercel.app/vehicles');

        foreach ($response->json() as $speciesData) {
            $vehicle = Vehicle::create([
                'id' => $speciesData['id'],
                'name' => $speciesData['name'],
                'description' => $speciesData['description'],
                'vehicle_class' => $speciesData['vehicle_class'],
                'length' => $speciesData['length'],

            ]);
        }
    }
}
