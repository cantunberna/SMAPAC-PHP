<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PivotRequesteds extends Model
{
    protected $table = 'assigned_requesteds';


//     public function requesteds()
//  {
//      return $this->belon(Requested::class, 'requested_id');
//  }
 public function requesteds()
 {
     return $this->belongsTo(Requested::class,'requested_id');
 }
}
