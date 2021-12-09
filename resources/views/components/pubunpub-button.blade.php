@props(['post'])

<form action="/admin/posts/{{ $post->id }}/{{ $post->state == 'pub' ? 'draft' : ($post->state == 'draft' ? 'pub' : '') }}"
    method="POST"
    enctype="multipart/form-data"
    x-data="{open: false, poked: false, pokedyes: false, pokedno: false}">
        @csrf
        @method('PATCH')

    <button x-on:click.prevent="open =! open"
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
    <div x-show="open" x-on:click="open = false"
        class="bg-gray-800 opacity-40 backdrop-filter backdrop-blur w-screen h-screen fixed inset-0 z-50 overflow-auto flex"></div>
    <div x-cloak x-show="open"
        class="z-50 filter-none fixed inset-0 w-96 h-48 bg-white opacity-100 border border-gray-800 m-auto rounded-xl py-10 px-6 text-center flex flex-wrap shadow-lg">
        <div x-cloak class="w-full">Are you sure you want to {{ $post->state == 'pub' ? 'unpublish' : ($post->state == 'draft' ? 'publish' : '') }} "{{ $post->title }}"?</div>
        <button x-on:click="open =! open" 
            type="submit" name="state" value="{{ $post->state == 'pub' ? 'draft' : ($post->state == 'draft' ? 'pub' : '') }}" id="{{ $post->id }}" 
            class="bg-blue-200 h-10 w-24 m-auto grow border border-blue-800 rounded-full text-blue-800"
            :class="pokedyes
                ? 'w-20 shadow-none'
                : 'w-24 shadow'"
            x-on:touchstart="pokedyes = true"
            x-on:touchend="pokedyes = false"
            x-on:mousedown="pokedyes = true"
            x-on:mouseup="pokedyes = false"
        >Yes</button>
        <button x-on:click.prevent="open =! open"
            class="bg-red-200 h-10 w-24 grow m-auto border border-red-800 rounded-full text-red-800"
            :class="pokedno
                ? 'w-20 shadow-none'
                : 'w-24 shadow'"
            x-on:touchstart="pokedno = true"
            x-on:touchend="pokedno = false"
            x-on:mousedown="pokedno = true"
            x-on:mouseup="pokedno = false"
        >No</button>
    </div>
</form>