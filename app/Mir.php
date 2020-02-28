<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mir extends Model
{
    protected $fillable = [
        'component', 
        'objective', 
        'fedresource', 
        'ownresource',
        'trianual',
        'nineteen',
        'twenty',
        'twenty_one', 
        'slug'
    ];


    public function activities()
    {
        return $this->hasMany('App\Activity');
    }
    
    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
