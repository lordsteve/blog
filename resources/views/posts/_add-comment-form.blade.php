@auth
    <x-panel>
        <form method="POST" action="/post/{{ $post->slug }}/comments">
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/100?u={{ auth()->id() }}" alt="" width="60"
                    height="60" class="rounded-full">
                <p class="ml-4">Say what you will...</p>
            </header>
            <div class="mt-6">
                <textarea name="body" class="w-full txt-sm focus:outline-none focus:ring" cols="30"
                    rows="10" placeholder="Say whatever you want" required></textarea>
                @error('body')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>
            <div class="flex justify-end mt-6">
                <x-submit-button>Post</x-submit-button>
            </div>
        </form>
    </x-panel>
@else
    <x-panel>
        <p class="font-semibold">
            <a href="/register" class="hover:underline">Register</a> or <a href="/login"
                class="hover:underline">log in</a> to comment.
        </p>
    </x-panel>
@endauth
