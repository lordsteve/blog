@props(['post'])

<form action="/admin/posts/{{ $post->id }}/{{ $post->state == 'pub' ? 'draft' : ($post->state == 'draft' ? 'pub' : '') }}"
    id="pubunpub{{ $post->id }}"
    method="POST"
    enctype="multipart/form-data">
        @csrf
        @method('PATCH')
</form>

    <a x-data="{open: false, poked: false, pokedyes: false, pokedno: false}" 
        href="/admin/posts/{{ $post->id }}/alert/{{ $post->state == 'pub' ? 'draft' : ($post->state == 'draft' ? 'pub' : '') }}"
        x-on:click="open = true"
        form="pubunpub{{ $post->id }}"
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
        $post->state == 'draft' ? 'Draft' : 'Unknown') }}</a>