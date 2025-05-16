<?php

namespace App\Livewire;

use Livewire\Component;

class GhibliFilm extends Component
{
    public $title = "Le Voyage de Chihiro";

    public function render()
    {
        return view('livewire.ghibli-film');
    }
}
