<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostsGrid extends Component
{
    public $perPage = 5;

    public function loadMore()
    {
        $this->perPage += 5;
    }

    public function render()
    {
        $posts = Post::latest()->where('state', 'pub')->filter(request(['search', 'category', 'author']))->paginate($this->perPage)->withQueryString();

        return view('livewire.posts-grid', [
            'posts' => $posts
        ]);
    }
}
