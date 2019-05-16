<?php

use App\Post;
use App\User;
use App\Country;
use App\Photo;
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

 

// Route::get('/about', function () {
//     return "Hi about page";
// });


// Route::get('/contact', function () {
//     return "Hi contact page";
// });

// Route::get('/post/{id}', function ($id) {
//     return "this is post number ". $id;
// });


/******************************************************
						route nickname
*******************************************************/

// Route::get('/admin/posts/example', array('as'=>'admin.home' ,function () {
//     $url = route('admin.home');   //grab the url from top and save it in $url
//     							  //route is laravel helper function

//     return "this url is ". $url; //instead of passing it to functon, we can assign the big url to var 
// }));


//Route::get('/post/{id}', 'PostsController@index'); //index is the method in the controller PostController

// Route::resource('posts', 'PostsController'); //has all functions automatically & methods

// Route::get('/contact', 'PostsController@contact');

// Route::get('/post/{id}/{name}/{password}', 'PostsController@show_post');


/***********************************************************
				Database RAW SQL Queries
************************************************************/

/**********  INSERT  *************/

// Route::get('/insert', function(){
// 	DB::insert('insert into posts(title, content) values(?, ?)', ['PHP life', 'PHP laravel is interesting and really good highly recommended to start learnng them ']);
// });

/**********  READ  *************/

// Route::get('/read', function() {

// 	$results = DB::select('select * from posts where id = ?', [1]);

// 	foreach($results as $post)
// 	{
// 		return $post->title;
// 	}


// });

/**********  UPDATE  *************/

// Route::get('/update', function() {

// $updated = DB::update('update posts set title = "Update title" where id = ?', [1]);

// return $updated;

// });

/**********  DELETE  *************/

// Route::get('/delete', function() {

// $deleted = DB::delete('delete from posts where id = ?', [1]);

// return $deleted;

// });


/*
|--------------------------------------------------------------------------
| Eloquent ORM
|--------------------------------------------------------------------------
*/

/************************************************************
						READ
*************************************************************/
// Route::get('/read', function(){

// $posts = Post::all();   //Pulls all record and save in $posts

// foreach ($posts as $post) {
// 	return $post->title;
// }

// });

// Route::get('/find', function(){

// $post = Post::find(4);   //Pulls all record and save in $posts

// return $post->title;
// });

// Route::get('/findwhere', function() {
// $posts = Post::where('id', 4)->orderby('id', 'desc')->take(1)->get();

// return $posts;

// });

// Route::get('/findmore', function(){
// 	$posts = Post::findOrFail(1);
// return $posts;



// Route::get('/findmore2', function(){
// $posts = Post::where('users_count', '<', 50)->firstOrFail();
// });

/************************************************************
						INSERT
*************************************************************/

// Route::get('/basicinsert', function() {

// $post = new Post;

// $post->title = 'new Eloquent title insert';
// $post->content = 'Content for the next post eally cool haha';

// $post->save();          //insert or overwrite if only one present


// });

/************************************************************
						SAVE
*************************************************************/




// Route::get('/basicinsert2', function() {

// $post = Post::find(4);

// $post->title = 'new Eloquent title insert 2 or update';
// $post->content = 'XAMPP is meant only for development purposes. It has certain configuration settings that make it easy to develop';

// $post->save();          //insert or overwrite if only one present


// });




/************************************************************
			cREATE DATA AND CONIG MASS assignment
*************************************************************/
// Route::get('/create', function(){

// Post::create(['title'=>'create methos','content'=>'I\'m learning mass assignment']);        //this will cause an exception if not created 4fillable in post.php model and not allow you to put data as it thinks it's not safe



// });

/************************************************************
						UPDATE
*************************************************************/


// Route::get('/update', function() {
// Post::where('id', 4)->where('is_admin', 0)->update(['title'=>'NEW PHP', 'content'=>'I love my ...IDK']);
// 	# code...


// });

/************************************************************
						DELETE
*************************************************************/
//
// Route::get('/delete', function(){

// $post = Post::find(4);

// $post->delete();
// });



// Route::get('/delete2', function(){

// Post::destroy(6,7);

//  //Post::where('is_admin', 0)->delete();      //Also works

// });

/************************************************************
						SOFT DELETE
*************************************************************/


// Route::get('/softdelete', function(){

// Post::find(8)->delete();
// });

// Route::get('/readsofdelte', function(){

// *Pull and return, but empty as the items are soft deleted**
// $post = Post::find(1);

// return $post;
/************************************************/

/**********Displays the item method 1*************/
// $post = Post::withTrashed()->where('is_admin', 0)->get();

// return $post;
// });
/**************************************************/

/**********Displays the item method 2*************/
// $post = Post::onlyTrashed()->where('is_admin', 0)->get();

// return $post;
// });
/****************************************************/

/************************************************************
						RESTORE SOFT DELETE
*************************************************************/
// Route::get('/restore', function(){

// Post::withTrashed()->whereNotNull('deleted_at')->restore();
// });

/************************************************************
				PERMANENT DELETE SOFT DELETE
*************************************************************/

// Route::get('/forceDelete', function(){


/**********method 1*************/

// Post::withTrashed()->whereNotNull('deleted_at')->forceDelete();


/**********method 2*************/

// Post::onlyTrashed()->where('is_admin', 0)->forceDelete();
// });

/************************************************************
				ELOQUENT RELATIONSHIPS
*************************************************************/

/*********  ONE TO ONE RELATIONSHIP ************/

// Route::get('/user/{id}/post', function($id){

// //return User::find($id)->post; //will return the whole post rec related to id

// return User::find($id)->post->title; //wil return title

// });

/*********  INVERSE RELATIONSHIP ************/


// Route::get('/post/{id}/user', function($id) {


// 	return Post::find($id)->user->name;
// });

/*********  ONE TO MANY RELATIONSHIP ************/

// Route::get('/posts', function(){

// 	$user = User::find(1);

// 	foreach ($user->posts as $post) {
// 		echo $post->title . "<br>";  //return would return only 1 title, echo loops all titles
		
// 	}


// });

/*********  MANY TO MANY RELATIONSHIP ************/

// Route::get('/user/{id}/role', function($id){

// $user = User::find($id);
// foreach($user->roles as $role){
// 	return $role->name;

// }
// });

// Route::get('/user/{id}/rol', function($id){

// $user = User::find($id)->roles()->orderBy('id', 'desc')->get(); //return complete role

// return $user;
// });

/********* Accessing the intermediate table / pivot ************/

// Route::get('/user/pivot', function(){
// 	$user = User::find(1);

// 	foreach($user->roles as $role){
// 		echo $role->pivot->created_at;
// 	}

// });

/************ Many Relations ****************/

// Route::get('/user/country', function(){

// $country = Country::find(2);

// foreach($country->posts as $post){
// 	return $post->title;
// }
// });

/************ Polymorphic Relations ****************/

// Route::get('/user/photos', function(){

// $user = User::find(1);

// foreach($user->photos as $photo){
// 	return $photo;
// }

	
// });

// Route::get('/post/{id}/photos', function($id){

// $post = Post::find($id);

// foreach($post->photos as $photo){
// 	echo $photo->path . "<br>";
// }

	
// });

/************ Polymorphic Relations Inverse****************/

Route::get('/photo/{id}/post' , function($id){
 	$photo = Photo::findOrFail($id);

 	return $photo->imageable;
});
