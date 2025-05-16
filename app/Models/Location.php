<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    //
        protected $fillable = [
            "id",
            "name",
            "climate",
            "terrain",
            "surface_water"
        ];

    public $incrementing = false; // Parce que l'API utilise des UUIDs

    public function films()
    {
        return $this->belongsToMany(Film::class);
    }

    public function people()
    {
        return $this->hasMany(Person::class);
    }
}
