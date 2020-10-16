<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function () {
    $name = request('name');
    return view('test', [
        'name' => $name
    ]);
});

// Route::get('/posts/{post}', function ($post) {
//     $posts = [
//         'my-first-post' => "This is my first blog post",
//         'my-second-post' => "Two posts already!"
//     ];
    
//     if (! array_key_exists($post, $posts)) {
//         abort(404, "Sorry, that post doesn't exist.");
//     }

//     return view('post', [
//         'post' => $posts[$post]
//     ]);

// });

Route::get('/posts/{post}', 'App\Http\Controllers\PostsController@show');

Route::get('/contact', function() {
    return view('contact');
});

Route::get('/about', function() {
    $articles = App\Models\Article::take(3)->latest()->get();
    return view('about', [
        'articles' => $articles
    ]);
});

Route::get('/articles', 'App\Http\Controllers\ArticlesController@index');

Route::post('/articles', 'App\Http\Controllers\ArticlesController@store');

Route::get('/articles/create', 'App\Http\Controllers\ArticlesController@create');

Route::get('/articles/{article}', 'App\Http\Controllers\ArticlesController@show')->name('articles.show');

Route::get('/articles/{article}/edit', 'App\Http\Controllers\ArticlesController@edit');

Route::put('/articles/{article}', 'App\Http\Controllers\ArticlesController@update');