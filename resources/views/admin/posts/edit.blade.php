<x-layout>
    <x-setting :heading="'Edit Post: ' . $post->title">
        <form action="/admin/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')
            <x-form.input name="title" :value="old('title', $post->title)"/>
            <div class="flex">
                <div class="flex-1 mr-4"><x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)"/></div>
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl" width="100">
            </div>
            <x-form.textarea name="excerpt">{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
            <x-form.textarea name="body">{{ old('body', $post->body) }}</x-form.textarea>
            <x-form.field>
                <x-form.label name="category" />

                <select name="category_id" id="category_id" class="bg-white border rounded-md">
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}>
                            {{ ucwords($category->name) }}
                        </option>
                    @endforeach
                </select>

                @error('category')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                @enderror

            </x-form.field>
            <x-form.button>Update</x-form.button>
        </form>
    </x-setting>
</x-layout>