<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'email', 'text', 'date', 
    ];
    //COLLEGO ONE TO MANY I MESSAGGI E GLI APPARTAMENTI
    public function apartment() {
        return $this->belongsTo('App\Apartment');
    }
}
