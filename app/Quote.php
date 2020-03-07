<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    protected $fillable = ['requisition_id','department_id',
        'prov_id_one',
        'prov_one_img',
        'prov_id_two',
        'prov_two_img',
        'prov_id_three',
        'prov_one_thre'
 ];


    public function departments()
    {
    return $this->belongsToMany(Department::class,'assigned_quotes');
    }

    public function quotes()
    {
        return $this->belongsToMany(PivotQuotes::class, 'assigned_quotes');
    }

    public function requisitions()
    {
        return $this->belongsToMany(Requisition::class,'assigned_quotes');
    }


}
