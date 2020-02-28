<?php

namespace App;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Coordination extends Model
{
    protected $fillable = ['name', 'slug'];
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

    public function departments()
    {
        return $this->belongsToMany(Department::class, 'assigned_departments');
    }

    public function requisitions()
    {
        return $this->hasMany(Coordination::class, 'assigned_requisitions');
    }

}
