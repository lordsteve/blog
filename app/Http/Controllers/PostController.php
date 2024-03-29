<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Validation\Rule;

class PostController extends Controller
{

    public function show(Post $post)
    {
        return view('posts.show', ['post' => $post]);
    }

    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()->where('state', 'pub')->filter(request(['search','category','author']))->paginate(6)->withQueryString()
        ]);
    }
}
