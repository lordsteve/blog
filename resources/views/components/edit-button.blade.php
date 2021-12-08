@props(['id'])

<div class="float-right flex w-14 h-14">
    <a href="/admin/posts/{{ $id }}/edit" class="m-auto">
        <img src="/images/edit.svg"
            x-data="{ poked: false }"
            class="rounded-full px-4 p-1"
            :class="poked
                ? 'bg-gray-400 border-gray-600 border h-5 shadow-md'
                : 'hover:bg-gray-200 hover:border-gray-400 border border-white h-6 hover:shadow-lg'"
            x-on:touchstart="poked = true"
            x-on:touchend="poked = false"
            x-on:mousedown="poked = true"
            x-on:mouseup="poked = false"
        />
    </a>
</div>