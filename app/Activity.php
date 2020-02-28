<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    protected $fillable = [
        'component_id', 
        'department_id', 
        'ownresource_id', 
        'activity', 
        'amount', 
        'trianual', 
        'fist_year', 
        'second_year', 
        'third_year', 
        'indicator',
        'formula',
        'frequency',
        'measure',
        'prog_indicator',
        'prog_one',
        'prog_two',
        'prog_three',
        'prog_four',
        'real_indicator',
        'real_one',
        'real_two',
        'real_three',
        'real_four',
        'total',
        'verification',
        'supposed'
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */

    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function component()
    {
        return $this->belongsTo(Mir::class);
    }
  
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
