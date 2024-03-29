<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
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

    // * One to One Relationship
    public function post(){
        return $this->hasOne('App\Post');
    }

    // * One to Many Relationship
    public function posts() {
        return $this->hasMany('App\Post');
    }

    // * Accessing the Pivot Table
    public function roles() {
        return $this->belongsToMany('App\Role');
    }
}