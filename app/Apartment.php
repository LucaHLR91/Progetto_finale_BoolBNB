<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use eloquentFilter\QueryFilter\ModelFilters\Filterable;
use Akuechler\Geoly;

class Apartment extends Model
{
    use Filterable;
    use Geoly;

    private static $whiteListFilter = ['*'];

    public function serializeRequestFilter($request)
    {
       $request['rooms'] = ['<', $request['rooms']];
       $request['beds'] = ['<', $request['beds']];
       return $request;
    }
    
    protected $fillable = [
        'title', 'beds', 'rooms', 'bathrooms', 'square_meters', 'image', 'avaliability', 'address', 'city', 'latitude', 'longitude', 'slug',
    ];

    //COLLEGO MANY TO MANY APPARTAMENTI E SERVIZI
    public function services() {
        return $this->belongsToMany('App\Service');
    }

     //COLLEGO MANY TO MANY APPARTAMENTI E SPONSORIZZAZIONI
     public function sponsorships() {
        return $this->belongsToMany('App\Sponsorship');
    }
    // COLLEGO ONE TO MANY GLI APPARTAMENTI AI MESSAGGI
    public function messages() {
        return $this->hasMany('App\Message');
    }
    // COLLEGO ONE TO MANY GLI APPARTAMENTI E GLI UTENTI
    public function user() {
        return $this->belongsTo('App\User');
    }
    // COLLEGO ONE TO MANY GLI APPARTAMENTI ALLE VISUALIZZAZIONI
    public function views() {
        return $this->hasMany('App\View');
    }

    public function canView()
    {
        return $this->user_id === auth()->id();
    }
}
