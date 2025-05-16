<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    //
    protected $fillable = [
        'id',
        'name',
        'gender',
        'age',
        'eye_color',
        'hair_color',


    ];

    public $incrementing = false; // Parce que l'API utilise des UUIDs

    public function films()
    {
        return $this->belongsToMany(Film::class);
    }

    public function species()
    {
        return $this->belongsTo(Species::class);
    }

    public function vehiclesPiloted()
    {
        return $this->hasMany(Vehicle::class, 'pilot');
    }


}
