<?php
use App\Models\Post;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {  //Answer call to root directory and start working
    return view('posts', [  //Display /views/posts.blade.php
        'posts' => Post::all()  //Use the Post model to find all the posts and pass them along to /views/posts.blade.php
    ]);
});


Route::get('posts/{post}', function ($slug) {   //Answer call to posts directory, pass wildcard URI to "slug" variable, get to work
    return view('post', [   //display /views/post.blade.php
        'post' => Post::find($slug)   //Using the Post model, find the correct post based on the "slug" variable to pass along to /view/posts.blade.php
    ]);
})->where('post', '[A-z_/-]+');  //Only do any of the above if the wildcard URI is composed of letters, underscores, and/or dashes