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

public function posts(){
    return $this->hasMany('App\Post');

}

public function roles(){

    return $this->belongsToMany('App\Role')->withPivot('created_at');    //'withPivot  --  let's the model know that we need to pull this intermediate table
    
  //  return $this->belongsToMany('App\Role', 'user_role', 'user_id', 'role_id');               //this format incase of a different table name than default,2nd para-> table name, 3rd para-> users table foreign key, 4th para-> role table foreign key
}

public function photos() {
    return $this->morphMany('App\Photo', 'imageable');
}


}
