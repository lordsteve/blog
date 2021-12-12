@props(['post'])

<article
    {{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl hover:shadow-lg']); }}>
    <div class="py-6 px-5">
        <div>
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl">
        </div>

        <div class="mt-8 flex flex-col justify-between">
            <header>
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

                <div style="width:130px" x-data="{ poked: false }">
                    <a href="/posts/{{ $post->slug }}"
                        class="py-2 text-xs font-semibold transition-colors duration-300 bg-gray-200 rounded-full hover:bg-gray-300"
                        :class="poked
                            ? 'px-7 shadow-none'
                            : 'px-8 shadow-lg'"
                        x-on:touchstart="poked = true"
                        x-on:touchend="poked = false"
                        x-on:mousedown="poked = true"
                        x-on:mouseup="poked = false"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
