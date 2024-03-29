@props(['post'])

<article
    class="transition-colors duration-300 border border-gray-500 border-opacity-0 fade-in hover:bg-gray-100 hover:border-opacity-100 rounded-xl hover:shadow-lg">
    <div class="px-5 py-6 lg:flex">
        <div class="flex-1 lg:mr-8">
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl">
        </div>

        <div class="flex flex-col justify-between flex-1">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <x-category-button :category="$post->category" />
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
                        Published <time> {{ $post->created_at->diffForHumans() }} </time>
                    </span>
                </div>
            </header>

            <div class="mt-2 text-sm">
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
                <div class="hidden lg:block">
                    <a href="/posts/{{ $post->slug }}"
                        class="inline-flex px-8 py-2 text-xs font-semibold transition-colors duration-300 bg-gray-200 rounded-full shadow-lg hover:bg-gray-300 active:shadow active:scale-95 active:translate-y-1"
                        >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
