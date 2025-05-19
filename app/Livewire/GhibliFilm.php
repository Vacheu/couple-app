<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Film;


class GhibliFilm extends Component
{
    public $title = "Le Voyage de Chihiro";

    public $films;

    public function mount()
    {
        $this->films = Film::all();
    }
    public function render()
    {
        return view('livewire.ghibli-film', [
            'films' => $this->films,
        ]);
    }
}
