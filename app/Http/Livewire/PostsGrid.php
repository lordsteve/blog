<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Pagination\Cursor;
use Illuminate\Support\Collection;
use Livewire\Component;

class PostsGrid extends Component
{
    public $posts;

    public $nextCursor;

    public $hasMorePages;

    public function mount()
    {
        $this->posts = new Collection();
        $this->loadMore();
    }

    public function loadMore()
    {
        if ($this->hasMorePages !== null && !$this->hasMorePages) {
            return;
        }
        $posts = Post::latest()->where('state', 'pub')->filter(request(['search', 'category', 'author']))->cursorPaginate(
            5,
            ['*'],
            'cursor',
            Cursor::fromEncoded($this->nextCursor)
        );
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
