<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apartment extends Model
{
    protected $fillable = [
        'title', 'beds', 'rooms', 'bathrooms', 'square_meters', 'image', 'avaliability', 'address', 'city', 'latitude', 'longitude', 'slug',
    ];
}
