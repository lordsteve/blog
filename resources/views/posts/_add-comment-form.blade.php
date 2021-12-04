@auth
    <x-panel class="d-flex align-content-center flex-wrap">

        <div class="float-left">
            <img src="https://i.pravatar.cc/100?u={{ auth()->id() }}" alt="" width="60" height="60" class="rounded-full">
        </div>
        <div x-data="{ sz: '1', sh : false }" class="d-flex  mt-4 float-right" style="width:calc(100% - 66px)" @click.away="sz = 1, sh = false">
            <form name="com" method="POST" action="/post/{{ $post->slug }}/comments">
                @csrf
                    <textarea class="txt-sm focus:outline-none" style="width:100%;resize:none"
                        name="body"
                        :rows="sz"
                        placeholder="Go on! Leave a comment!"
                        required
                        @click="sz = 10, sh = true"
                        @keyup.enter="document.com.submit()"></textarea>
                    <x-form.error name='body' />
                    <div style="clear: both;"></div>
                    <div class="flex justify-end mt-6" x-show="sh">
                        <x-form.button>Post</x-form.button>
                    </div>
            </form>
        </div>
        <div style="clear: both;"></div>
    </x-panel>
@else
    <x-panel>
        <p class="font-semibold">
            <a href="/register" class="hover:underline">Register</a> or <a href="/login" class="hover:underline">log in</a> to comment.
        </p>
    </x-panel>
@endauth
