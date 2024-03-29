<x-layout>
    <x-setting :heading="'Edit Post: ' . $post->title">
        <form action="/admin/posts/{{ $post->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PATCH')

            <x-form.input name="title" :value="old('title', $post->title)" required />
            <x-form.input name="slug" :value="old('title', $post->slug)" type="hidden"><p class="text-sm">{{ $post->slug }}</p></x-fom.input>

            <div class="flex">
                <div class="flex-1 mr-4">
                    <x-form.input name="thumbnail" type="file" :value="old('thumbnail', $post->thumbnail)" />
                </div>
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="" class="rounded-xl" width="100">
            </div>

            <x-form.textarea name="excerpt">{{ old('excerpt', $post->excerpt) }}</x-form.textarea>
            <x-form.textarea name="body" rows="15">{{ old('body', $post->body) }}</x-form.textarea>

            <x-form.field>
                <x-form.label name="category" />

                <select name="category_id" id="category_id" class="bg-white border rounded-md" required>
                    @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}"
                            {{ old('category_id', $post->category_id) == $category->id ? 'selected' : '' }}
                            >{{ ucwords($category->name) }}</option>
                    @endforeach
                </select>
                <x-form.error name="category" />
            </x-form.field>

            <x-form.button name="state" value="pub">
                Publish Update
            </x-form.button>
            <x-form.button name="state" value="draft" class="ml-4 bg-white text-gray-700 uppercase font-semibold text-xs py-2 px-10 rounded-2xl border border-gray-200 hover:bg-blue-100">
                Save Draft
            </x-form.button>
        </form>
    </x-setting>
</x-layout>
