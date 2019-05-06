<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });


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


Route::get('/post/{id}', 'PostsController@index'); //index is the method in the controller PostController

Route::resource('posts', 'PostsController'); //has all functions automatically & methods




