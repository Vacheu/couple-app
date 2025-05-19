<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Film;

class GhibliFilmDetail extends Component
{
    public Film $film;

    public function mount(Film $film)
    {
        $this->film = Film::with('people.species')
            ->findOrFail($film->id);
    }


    public function render()
    {
        return view('livewire.ghibli-film-detail', [
            'film'   => $this->film,
            'people' => $this->film->people,  // facultatif, tu peux l’appeler directement en Blade
        ]);
    }
}
