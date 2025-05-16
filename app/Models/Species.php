<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Species extends Model
{
    //

    protected $fillable = [
      "id",
      "name",
      "classification",
      "eye_colors",
      "hair_colors"
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
