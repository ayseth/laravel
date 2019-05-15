<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    //

    public function posts(){

    	// return $this->hasManyThrough('App\Post', 'App\User', 'country_id');   //this method uses 2 tables, Post and User(which is the intermediate table where we get the users country), 3rd para-> define the foreign key that 

    	return $this->hasManyThrough('App\Post', 'App\User');
    }
}
