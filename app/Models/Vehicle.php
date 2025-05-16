<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    //

    protected $fillable = [
        "id",
        "name",
        "description",
        "vehicle_class",
        "length",
        "pilot"
    ];

    public $incrementing = false; // Parce que l'API utilise des UUIDs

    public function films()
    {
        return $this->belongsToMany(Film::class);
    }

    public function pilot()
    {
        return $this->belongsTo(Person::class, 'pilot');
    }

}
