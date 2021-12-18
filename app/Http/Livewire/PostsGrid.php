<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Illuminate\Pagination\Cursor;
use Livewire\Component;

class PostsGrid extends Component
{
    private $posts;

    public $nextCursor;

    public $hasMorePages;

    public function mount()
    {
        $this->loadMore();
    }

    private function index()
    {
        return Post::latest()->where('state', 'pub')->filter(request(['search', 'category', 'author']))->cursorPaginate(
            5,
            ['*'],
            'cursor',
            Cursor::fromEncoded($this->nextCursor)
        );
    }

    public function loadMore()
    {
        // If there are definitely no more pages, then forget about it. BUT go ahead an build the next new posts, 'cause we're going to need them no matter what. If there are already posts on the page, add the new ones onto the current ones and send them all forward. Otherwise, just send the new ones forward. Then determine whether there are more pages and if there are, store the next page for the next time.

        //So, because a private variable won't hold its data and a public variable won't pass a class collection, each time the method is called, we'll have to somehow determine the current post index without sending it back from the front end.

        //You can determine the current post index by calculating the number of cursors between the first and the current cursor. These options are not natively available for Cursor Pagination.

        //WITHOUT BEING ABLE TO TACK NEW POSTS ONTO THE OLD POSTS WITHOUT MAKING NEW DATABASE CALLS FOR THE OLD POSTS IT DEFEATS THE PURPOSE OF INFINITE SCROLL.

        if ($this->hasMorePages !== null && !$this->hasMorePages) {
            return;
        }

        $newPosts = $this->index();

        $this->posts
            ? $this->posts->push($newPosts->items())
            : $this->posts = $newPosts;

        if ($this->hasMorePages === true) {
            $this->nextCursor = $newPosts->nextCursor()->encode();
        }
        $this->hasMorePages = $newPosts->hasMorePages();
    }

    public function render()
    {
        $posts = $this->posts;

        return view('livewire.posts-grid', [
            'posts' => $posts
        ]);
    }
}
