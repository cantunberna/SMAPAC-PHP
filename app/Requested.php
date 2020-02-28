<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Requested extends Model
{
    protected $table = 'requesteds';

    public function requisitions()
    {
        return $this->hasOne(Requisition::class, 'assigned_requisteds');
    }
}
