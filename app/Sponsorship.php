<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorship extends Model
{
    protected $fillable = [
        'name', 'price', 'duration'
    ];

     //COLLEGO MANY TO MANY APPARTAMENTI E SPONSORIZZAZIONI
     public function apartments() {
        return $this->belongsToMany('App\Apartment');
    }
}
