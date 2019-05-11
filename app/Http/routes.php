<?php

use App\Post;
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


// //route nickname

// Route::get('/admin/posts/example', array('as'=>'admin.home' ,function () {
//     $url = route('admin.home');   //grab the url from top and save it in $url
//     							  //route is laravel helper function

//     return "this url is ". $url; //instead of passing it to functon, we can assign the big url to var 
// }));


//Route::get('/post/{id}', 'PostsController@index'); //index is the method in the controller PostController

// Route::resource('posts', 'PostsController'); //has all functions automatically & methods

// Route::get('/contact', 'PostsController@contact');

// Route::get('/post/{id}/{name}/{password}', 'PostsController@show_post');

/*
|--------------------------------------------------------------------------
| Database RAW SQL Queries
|--------------------------------------------------------------------------
*/

// Route::get('/insert', function(){
// 	DB::insert('insert into posts(title, content) values(?, ?)', ['PHP life', 'PHP laravel is interesting and really good highly recommended to start learnng them ']);
// });

// Route::get('/read', function() {

// 	$results = DB::select('select * from posts where id = ?', [1]);

// 	foreach($results as $post)
// 	{
// 		return $post->title;
// 	}


// });


// Route::get('/update', function() {

// $updated = DB::update('update posts set title = "Update title" where id = ?', [1]);

// return $updated;

// });


// Route::get('/delete', function() {

// $deleted = DB::delete('delete from posts where id = ?', [1]);

// return $deleted;

// });


/*
|--------------------------------------------------------------------------
| Eloquent ORM
|--------------------------------------------------------------------------
*/

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



Route::get('/findmore2', function(){
$posts = Post::where('users_count', '<', 50)->firstOrFail();
});