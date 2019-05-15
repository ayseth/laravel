<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //

    public function users(){
    	//inverse of custom tab;e
    	return $this->belongsToMany('App\User');
    }
}
