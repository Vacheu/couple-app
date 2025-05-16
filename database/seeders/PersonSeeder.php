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

class PersonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //

        $response = Http::get('https://ghibliapi.vercel.app/people');

        foreach ($response->json() as $personData) {
            $person = Person::create([
                'id' => $personData['id'],
                'name' => $personData['name'],
                'gender' => $personData['gender'],
                'age' => $personData['age'],
                'eye_color' => $personData['eye_color'],
                'hair_color' => $personData['hair_color'],

            ]);
        }
    }
}
