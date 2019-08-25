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

Route::get('/', function () {
    return view('welcome');
});

Route::resource('/posts', 'PostsController');
Route::get('/contact', 'PostsController@contact');
Route::get('/post/{id}', 'PostsController@show_post');

Route::get('/add-to-db', function() {
    DB::insert('INSERT INTO posts(title, content) values(?, ?)', ['Learning Laravel', 'I am learning Laravel to make a kick ass app!']);
    return 'inserted my g';
});

Route::get('/find', function(){
    $posts = Post::all();
    foreach($posts as $post) {
        return $post->title;
    };
});

Route::get('/findwhere/{id}', function($id) {
    $posts = Post::where('id', $id)->orderBy('id', 'DESC')->take(1)->get();
    return $posts;
});