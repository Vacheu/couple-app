<?php

namespace App\Livewire;

use Livewire\Component;

use App\Models\Person;

class GhibliPersonDetail extends Component
{

    public Person $person;

    public function mount(Person $person)
    {
        $this->person =  $person->load(['films', 'species']);
    }


    public function render()
    {
        return view('livewire.ghibli-person-detail', [
            'person'   => $this->person,

        ]);
    }
}
