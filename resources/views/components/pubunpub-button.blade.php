@props(['post'])

<form action="/admin/posts/{{ $post->id }}/{{ $post->state == 'pub' ? 'draft' : ($post->state == 'draft' ? 'pub' : '') }}"
    method="POST"
    enctype="multipart/form-data"
    x-data="{open: false, poked: false, pokedyes: false, pokedno: false}">
        @csrf
        @method('PATCH')

    <button x-on:click.prevent="open = true"
        class="inline-flex text-xs leading-5 font-semibold rounded-full
            {{ $post->state == 'pub' ? 'bg-green-100 text-green-800' : (
                $post->state == 'draft' ? 'bg-red-100 text-red-800' : 'bg-purple-100 text-purple-800')  }}"
        :class="poked
            ? 'px-1 shadow-none'
            : 'px-2 shadow'"
        x-on:touchstart="poked = true"
        x-on:touchend="poked = false"
        x-on:mousedown="poked = true"
        x-on:mouseup="poked = false"
    >{{ $post->state == 'pub' ? 'Published' : (
        $post->state == 'draft' ? 'Draft' : 'Unknown') }}</button>
    <x-modal blue="Yes" red="No" :post="$post" type="submit" name="state" value="{{ $post->state == 'pub' ? 'draft' : ($post->state == 'draft' ? 'pub' : '') }}" id="{{ $post->id }}">
        <div class="w-full mb-4 font-semibold">Are you sure you want to {{ $post->state == 'pub' ? 'unpublish' : ($post->state == 'draft' ? 'publish' : '') }} "{{ $post->title }}"?</div>
    </x-modal>
</form>