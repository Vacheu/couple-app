<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $fillable = [
        'id',
        'title',
        'original_title',
        'original_title_romanised',
        'image',
        'movie_banner',
        'description',
        'director',
        'producer',
        'release_date',
        'running_time',
        'rt_score',

    ];

    public $incrementing = false; // Parce que l'API utilise des UUIDs

    public function people()
    {
        return $this->belongsToMany(Person::class);
    }

    public function locations()
    {
        return $this->belongsToMany(Location::class);
    }

    public function species()
    {
        return $this->belongsToMany(Species::class);
    }

    public function vehicles()
    {
        return $this->belongsToMany(Vehicle::class);
    }



}
