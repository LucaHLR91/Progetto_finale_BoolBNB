<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = [
        'service_name', 'slug'
    ];

     //COLLEGO MANY TO MANY APPARTAMENTI E SERVIZI
     public function apartments() {
        return $this->belongsToMany('App\Apartment');
    }
}
