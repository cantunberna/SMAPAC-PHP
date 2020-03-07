<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PivotProducts extends Model
{
    protected $table = 'assigned_products';

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function purchases()
    {
        return $this->belongsTo(Purchase::class,'purchase_id');
    }

    // public function products()
    // {
    //     return $this->belongsTo(Requested::class,'products_id');
    // }

    public function requisition()
        {
            return $this->belongsTo(Requisition::class);
        }

     public function requesteds()
    {
       return $this->belongsTo(Requested::class,'products_id');
      }


}
