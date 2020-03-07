<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requested extends Model
{
    protected $table = 'requesteds';

    public function departaments()
    {
    return $this->belongsToMany(Department::class,'assigned_products');
    }


    public function requesteds()
    {
       return $this->belongsToMany(Requested::class,'');
    }

}
