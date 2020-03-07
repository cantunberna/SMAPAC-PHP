<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $fillable = ['name', 'slug','user_id'];


    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function coordinations()
    {
        return $this->hasOne(Coordination::class, 'assigned_departments');
    }

    public function requisitions()
    {
        return $this->hasMany(Requisition::class,'assigned_requisitions');
    }
    public function quotes()
    {
        return $this->belongsToMany(Quote::class,'assigned_quotes');
    }


}
