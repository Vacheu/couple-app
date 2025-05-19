<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Species;

class GhibliSpeciesDetail extends Component
{

    public Species $species;

    public function mount(Species $species)
    {
        $this->species =  $species->load(['films', 'people']);
    }


    public function render()
    {
        return view('livewire.ghibli-species-detail', [
            'species'   => $this->species,

        ]);
    }
}
