<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class View extends Model
{
    protected $fillable = [
        'date'
    ];
    
    // COLLEGO ONE TO MANY LE VISUALIZZAZIONI AGLI APPARTAMENTI
    public function apartment() {
        return $this->belongsTo('App\Apartment');
    }
}
