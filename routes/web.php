<?php
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

Route::get('/', function () {  //Answer call to root directory and start working
    return view('posts', [  //Display /views/posts.blade.php
        'posts' => Post::latest('created_at')->get(),
        'categories' => Category::all()  //Use the Post model to get all posts, newest first, along with their correspnonding categories and authors and pass them along to /views/posts.blade.php
    ]);
});


Route::get('posts/{post:slug}', function (Post $post) {   //Answer call to posts directory, pass wildcard URI and look inside Post model to figure out which database entry matches and store it in 'post' variable, get to work
    return view('post', [   //display /views/post.blade.php
        'post' => $post   //pass database entry stored in 'post' variable along to /view/posts.blade.php
    ]);
});

Route::get('categories/{category:slug}', function(Category $category){
    return view('posts', [  //Display /views/posts.blade.php
        'posts' => $category->posts,
        'currentCategory' => $category,
        'categories' => Category::all()   //Use the Category model to find all the posts in a category and pass them along to /views/posts.blade.php along with the category and author
    ]);
});

Route::get('authors/{author:username}', function(User $author){
    return view('posts', [  //Display /views/posts.blade.php
        'posts' => $author->posts,
        'categories' => Category::all()   //Use the User model to find all the posts written by the author and pass them along to /views/posts.blade.php along with the category and author
    ]);
});
