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

 public function post(){

    return $this->hasOne('App\Post');  //go to posts table and look for 'user_id' col automatically by default, if a different column is to be specified or named diff, it should be a second parameter as "('App\Post', 'the_user_id')"
}

}
