<?php

namespace Database\Seeders;

use App\Models\Person;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Seeder;

class PersonSeeder extends Seeder
{
    public function run()
    {
        $apiPeople = Http::get('https://ghibliapi.vercel.app/people')->json();

        foreach ($apiPeople as $apiPerson) {
            // 1) Récupère l'URL, ou null si elle n'existe pas
            $speciesUrl = $apiPerson['species'] ?? null;

            // 2) Extrait l'UUID UNIQUEMENT si c'est valide, sinon null
            if ($speciesUrl && Str::contains($speciesUrl, '/species/')) {
                $speciesId = Str::afterLast($speciesUrl, '/');
                // au cas où Str::afterLast renverrait '' :
                $speciesId = $speciesId !== '' ? $speciesId : null;
            } else {
                $speciesId = null;
            }

            Person::updateOrCreate(
                ['id' => $apiPerson['id']],
                [
                    'name'        => $apiPerson['name'],
                    'gender'      => $apiPerson['gender'],
                    'age'         => $apiPerson['age'],
                    'eye_color'   => $apiPerson['eye_color'],
                    'hair_color'  => $apiPerson['hair_color'],
                    'species_id'  => $speciesId,  // ne sera jamais ''
                ]
            );
        }
    }
}


