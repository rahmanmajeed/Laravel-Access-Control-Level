<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable=['name','slug','description'];

    /**
     * The relationship is many between role and user..
     * @var array
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    /**
     * The relationship is many to many between role and permission.
     * @var array
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
    /**
     * The rlationship is many to many polymorphic between role and user.
     * @var array
     */
    public function users_access()
    {
        return $this->morphToMany(User::class,'accessible');
    }
}
