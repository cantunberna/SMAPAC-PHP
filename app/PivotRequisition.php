<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PivotRequisition extends Model
{
    protected $table = 'assigned_requisitions';


    public function users(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function coordinations()
    {
        return $this->belongsTo( Coordination::class,'coordination_id');
    }
    public function departments()
    {
        return $this->belongsTo( Department::class,'department_id');
    }
    public function requisition()
    {
        return $this->belongsTo(Requisition::class);
    }


}
