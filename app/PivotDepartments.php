<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PivotDepartments extends Model
{
    protected $table = 'assigned_departments';

    public function departaments()
    {
    return $this->belongsTo(Department::class);
    }
}
