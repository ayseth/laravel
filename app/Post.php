<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;     //to permanently del from trash page

class Post extends Model
{
	use SoftDeletes;
    // 
  //  protected $table = 'posts'; //if table is not named posts,manually assign
  //  protected $promaryKey = 'post_id'; //manually assign the id name, as by default it is 'id'


protected $dates = ['deleted_at'];         //to treat this col as a timestamp col

//allow those data to be inserted into the DB/ safe to insert to avoid mass assignment

	protected $fillable = [
		'title',
		'content'



	];
}
