<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $fillable=['name','slug','description'];
    /**
     * The relation is many to many relationship between permission and role.
     * @var array
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    /**
     * The relation is many to many relationship between permission and user.
     * @var array
     */
    public function users()
    {
        return $this->belongsToManyI(User::class);
    }
    /**
     * The relation is many to many polymorphic between permission and user.
     * @var array
     */
    public function users_access()
    {
        return $this->morphToMany(User::class,'accessible');
    }
}
