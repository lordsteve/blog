@props(['comment'])

<x-panel class="bg-gray-100">
    <article class="flex space-x-4 fade-in">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/100?u={{ $comment->user_id }}" alt="" width="60" height="60" class="rounded-xl">
        </div>
        <div>
            <header class="mb-4">
                <h3 class="inline font-bold">{{ $comment->author->name }}</h3>
                <p class="text-xs text-gray-500">{{ '@' }}{{ $comment->author->username }}</p>
                <p class="text-xs">
                    posted
                    <time>{{ $comment->created_at->format('F j, Y, g:i a') }}</time>
                </p>
            </header>
            <p>{{ $comment->body }}</p>
        </div>
    </article>
</x-panel>
