<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','paterno','materno','curp','rfc','phone','birthday','gender','age','profession','email', 'password','address'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    // //set -> indica modificar o cambiar un valor antes de guardarlo en la BD
    // //segundo -> es el atributo que modificaremos
    // public function setPasswordAttribut($password)
    // {
    //     $this->attributes['password'] = bcrypt('$password');
    // }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'assigned_roles');
    }

    public function hasRoles(array $roles)
    {
        // dd($this->role);


        foreach ($roles as $role)
         {
             return $this->roles->pluck('name')->intersect($roles)->count();


            //  foreach ($this->roles as $userRole)
            // {

            //     if ($userRole->name === $role)
            //     {
            //         return true;
            //     }
            // }

        }
     return false;
    }

    public function isAdmin()
    {
        return $this->hasRoles(['admin']);
    }
    public function isCoor()
    {
        return $this->hasRoles(['coordinador']);
    }
    public function isTitular()
    {
        return $this->hasRoles(['titular']);
    }

    public function departments()
    {
        return $this->hasOne(Department::class, 'user_id');
    }


    public function requisitions()
    {
        return $this->hasOne(Requisition::class ,' assigned_requisitions');
    }


}
