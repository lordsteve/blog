<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Pagination\Cursor;
use Livewire\Component;

class PostsGrid extends Component
{
    public $posts;

    public $nextCursor;

    public $hasMorePages;

    public $query = null;

    public function mount()
    {
        $this->posts = Post::take(2)->get();
        $this->loadMore();
    }

    public function loadMore()
    {
        if ($this->hasMorePages !== null && !$this->hasMorePages) {
            return;
        }

        $this->query ?? $this->query = request(['search', 'category', 'author']);

        $posts = Post::latest()->where('state', 'pub')->filter($this->query)->cursorPaginate(
            5,
            ['*'],
            'cursor',
            Cursor::fromEncoded($this->nextCursor)
        );

        if ($this->hasMorePages == null){
            $this->posts->forget(['0', '1']);
        }

        $this->posts->push(...$posts->items());

        $this->hasMorePages = $posts->hasMorePages();
        if ($this->hasMorePages === true) {
            $this->nextCursor = $posts->nextCursor()->encode();
        }
    }

    public function render()
    {
        return view('livewire.posts-grid');
    }
}
