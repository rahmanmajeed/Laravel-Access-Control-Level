<?php

namespace App;

use App\Traits\UserTrait;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable,UserTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The relations is many to many relation between user and role.
     * 
     * @var array
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    /**
     * The relations is many to many rlation between user and permission.
     * 
     * @var array
     * @param string
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
    /**
     * The relation is many to many polymorphic relation between user and role.
     * @var array
     */
    public function roles_access()
    {
        return $this->morphedByMany(Role::class,'accessible');
    }
    /**
     * The relation is many to many polymorphic relation between user and permission.
     * @var array
     */
    public function permissions_access()
    {
        return $this->morphedByMany(Permission::class,'accessible');
    }
}
