<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // 
  //  protected $table = 'posts'; //if table is not named posts,manually assign
  //  protected $promaryKey = 'post_id'; //manually assign the id name, as by default it is 'id'


//allow those data to be inserted into the DB/ safe to insert to avoid mass assignment

	protected $fillable = [
		'title',
		'content'



	];
}
