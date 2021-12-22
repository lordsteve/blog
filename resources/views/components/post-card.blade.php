@props(['post'])

<article
    {{ $attributes->merge(['class' => 'flex flex-col hover:border hover:border-black justify-between px-5 py-6 fade-in transition-colors duration-300 hover:bg-gray-100 rounded-xl hover:shadow-lg']); }}>

        <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl">

        <header class="mt-8">
            <div class="space-x-2">
                <x-category-button :category="$post->category"/>
            </div>

            <div class="mt-4">
                @admin
                    <x-edit-button :id="$post->id" />
                @endadmin
                <h1 class="text-3xl">
                    <a href="/posts/{{ $post->slug }}">
                        {{ $post->title }}
                    </a>
                </h1>

                <span class="block mt-2 text-xs text-gray-400">
                    Published <time>{{ $post->created_at->diffForHumans() }}</time>
                </span>
            </div>
        </header>

        <div class="mt-4 text-sm">
            {!! $post->excerpt !!}
        </div>

        <footer class="flex items-center justify-between mt-8">
            <div class="flex items-center text-sm">
                <img src="/images/lary-avatar.svg" alt="Lary avatar">
                <div class="ml-3">
                    <h5 class="font-bold">
                        <a href="/?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                    </h5>
                </div>
            </div>

                <a href="/posts/{{ $post->slug }}"
                    class="inline-flex px-8 py-2 text-xs font-semibold transition-colors duration-300 bg-gray-200 rounded-full shadow-lg hover:bg-gray-300 active:shadow-none active:scale-95 active:translate-y-1"
                >Read More</a>
        </footer>

</article>
