<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PivotQuotes extends Model
{
    protected $table = 'assigned_quotes';

    public function departments()
    {
        return $this->belongsTo(Department::class,'department_id');
    }
    public function quotes()
    {
        return $this->belongsTo(Quote::class, 'quote_id');
    }

    public function requisitions()
    {
        return $this->belongsTo(Requisition::class, 'requisition_id');
    }


}
