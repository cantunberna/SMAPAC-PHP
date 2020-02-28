<?php

namespace App;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
class Requisition extends Model
{
    protected $fillable = ['folio',
        'added_on',
        'management',
        'administrative_unit',
        'required_on',
        'issue',
        'departure',
        'quantity',
        'unit',
        'concept',
        'remark',
        'img_req',
        'file_req',
        'status'];

    /*protected $casts = [
        'departure' => 'array',
        'quantity' => 'array',
        'unit'=> 'array',
        'concept' => 'array'
    ];*/
    public function requisitions()
    {
        return $this->belongsToMany(Requisition::class,'id');
    }

    public function coordinations()
    {
        return $this->belongsToMany(Coordination::class, 'assigned_requisitions');

    }

    public function departments()
    {
        return $this->belongsToMany(Department::class,'assigned_requisitions');
    }

    public function users()
   {
     return $this->belongsTo(User::class, 'assigned_requisitions');
    }

    public function requesteds()
    {
       return $this->belongsTo(Requested::class, 'assigned_requesteds');
    }
}

