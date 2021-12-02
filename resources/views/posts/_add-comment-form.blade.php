@auth
    <x-panel class="d-flex align-content-center flex-wrap">

        <div class="float-left">
            <img src="https://i.pravatar.cc/100?u={{ auth()->id() }}" alt="" width="60" height="60" class="rounded-full">
        </div>
        <div x-data="{ sz: '1', sh : false }" class="d-flex  m-auto float-right justify-center" style="width:calc(100% - 66px)" @click.away="sz = 1, sh = false">
            <form name="com" method="POST" action="/post/{{ $post->slug }}/comments">
                @csrf
                    <textarea name="body" class="txt-sm focus:outline-none" style="width:100%;resize:none" :rows="sz" @click="sz = 10, sh = true" placeholder="Say something I'm giving up on you" required x-transition @keyup.enter="document.com.submit()"></textarea>
                    @error('body')
                        <span class="text-xs text-red-500">{{ $message }}</span>
                    @enderror
                    <div style="clear: both;"></div>
                    <div class="flex justify-end mt-6" x-show="sh">
                        <x-submit-button>Post</x-submit-button>
                    </div>
            </form>
        </div>
        <div style="clear: both;"></div>
    </x-panel>
@else
    <x-panel>
        <p class="font-semibold">
            <a href="/register" class="hover:underline">Register</a> or <a href="/login"
                class="hover:underline">log in</a> to comment.
        </p>
    </x-panel>
@endauth
