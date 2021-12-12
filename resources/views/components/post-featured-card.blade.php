@props(['post'])

<article
    class="fade-in transition-colors duration-300 hover:bg-gray-100 border-opacity-0 border border-gray-500 hover:border-opacity-100 rounded-xl hover:shadow-lg">
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8">
            <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl">
        </div>

        <div class="flex-1 flex flex-col justify-between">
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

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time> {{ $post->created_at->diffForHumans() }} </time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-2">
                {!! $post->excerpt !!}
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3">
                        <h5 class="font-bold">
                            <a href="/?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                        </h5>
                    </div>
                </div>

                <div class="hidden lg:block" x-data="{ poked: false }">
                    <a href="/posts/{{ $post->slug }}"
                        class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2"
                        :class="poked
                            ? 'px-7 shadow-none'
                            : 'px-8 shadow-lg'"
                        x-on:touchstart="poked = true"
                        x-on:touchend="poked = false"
                        x-on:mousedown="poked = true"
                        x-on:mouseup="poked = false">Read
                        More</a>
                </div>
            </footer>
        </div>
    </div>
</article>

