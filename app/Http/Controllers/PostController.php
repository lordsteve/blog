<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Symfony\Component\HttpFoundation\Response as Response;

class PostController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::latest()
            ->filter(request([
                'search',
                'category',
                'author']))->paginate(6)->withQueryString()
        ]);
    }

    public function show(Post $post)
    {
        return view('posts.show', [
            'post' => $post
        ]);
    }

    public function create()
    {
        if (auth()->guest()) {
            abort(Response::HTTP_FORBIDDEN);
        }

        if (auth()->user()->username !== 'lordsteve') {
            abort(Response::HTTP_FORBIDDEN);
        }

        return view('posts.create');
    }
}
