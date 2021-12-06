@auth
    <x-panel class="flex">
        <div class="flex-shrink-0">
            <img src="https://i.pravatar.cc/100?u={{ auth()->id() }}" alt="" width="60" height="60" class="rounded-full">
        </div>
        <div x-data="{ sz: 1, sh : false }" class="flex-1 flex-shrink-0 ml-4 m-auto" @click.away="sz = 1, sh = false">
            <form name="com" method="POST" action="/post/{{ $post->slug }}/comments">
                @csrf
                <textarea style="resize:none;" class="txt-sm focus:outline-none w-full" name="body" :rows="sz"
                    placeholder="Go on! Leave a comment!" required @click="sz = 10, sh = true"
                    @keyup.enter.prevent="document.com.submit()"></textarea>
                <x-form.error name='body' />
                <div style="clear: both;"></div>
                <div class="flex justify-end" x-show="sh">
                    <x-form.button>Post</x-form.button>
                </div>
            </form>
        </div>
    </x-panel>
@else
    <x-panel>
        <p class="font-semibold">
            <a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">log in</a> to
            comment.
        </p>
    </x-panel>
@endauth
