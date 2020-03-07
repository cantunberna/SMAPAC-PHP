<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $fillable = ['requisition_id', 'coordination_id', 'department_id'];

    public function departaments()
    {
    return $this->belongsToMany(Department::class,'assigned_products');
    }

        public function requisition()
        {
            return $this->belongsTo(Requisition::class);
        }

}
