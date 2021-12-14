@props(['id'])

<div class="float-right">
    <a href="/admin/posts/{{ $id }}/edit">
        <img src="/images/edit.svg"
            class="inline-flex h-6 p-1 px-4 border border-transparent rounded-full hover:bg-gray-200 hover:border-gray-400 hover:shadow-lg' active:bg-gray-400 active:border-gray-600 active:scale-95 active:translate-y-1 active:shadow-md"
        />
    </a>
</div>