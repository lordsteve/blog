<?php
use App\Http\Controllers\PostController;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
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

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);

Route::get('authors/{author:username}', function(User $author){
    return view('posts', [  //Display /views/posts.blade.php
        'posts' => $author->posts,
        'categories' => Category::all()   //Use the User model to find all the posts written by the author and pass them along to /views/posts.blade.php along with the category and author
    ]);
});
