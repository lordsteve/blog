<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rule;
use Str;

class AdminPostController extends Controller
{
    public function index()
    {
        return view('admin.posts.index', [
            'posts' => Post::latest()->filter(request(['search','category',
            'author']))->paginate(10)->withQueryString()
        ]);
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store()
    {   
        Post::create(array_merge($this->validateThePost(),  [
            'user_id' => request()->user()->id,
            'thumbnail' => request()->hasFile('thumbnail')
                ? request()->file('thumbnail')->store('thumbnails')
                : $this->thumbnail = 'thumbnails/illustration-1.png'
        ]));

        return redirect('/posts/' . request()->post('slug'))->with('success', 'Post saved!');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', ['post' => $post]);
    }

    public function update(Post $post)
    {
        $attributes = $this->validateThePost($post);

        if ($attributes['thumbnail'] ?? false) {
            $attributes['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        }

        $post->update($attributes);

        return redirect("/posts/" . request()->post('slug'))->with('success', 'Post Updated!');
    }

    public function destroy(Post $post)
    {
        $post->delete();

        return back()->with('success', 'Post deleted.');
    }

    protected function validateThePost(?Post $post = null): array
    {   
        $post ??= new Post();

        request()->request->add([
            'slug' => Str::slug(request()->request->get('title')) . '-' . hash('md5', date('c'))
        ]);
        
        return request()->validate([
            'title' => 'required',
            'thumbnail' => 'image',
            'slug' => ['required', Rule::unique('posts', 'slug')->ignore($post)],
            'excerpt' => 'required',
            'body' => 'required',
            'category_id' => ['required', Rule::exists('categories', 'id')],
            'state' => 'required'
        ]);
    }
}
