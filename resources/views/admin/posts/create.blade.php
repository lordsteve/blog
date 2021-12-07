<x-layout>
    <x-setting heading="Publish New Post">
        <form action="/admin/posts" method="POST" enctype="multipart/form-data">
            @csrf

            <x-form.input name="title"/>
            <x-form.input name="thumbnail" type="file"/>
            <x-form.textarea name="excerpt">{{ old('excerpt') }}</x-form.textarea>
            <x-form.textarea name="body" rows="15">{{ old('body') }}</x-form.textarea>
            <x-form.field>
                <x-form.label name="category" />

                    <select name="category_id" id="category_id" class="bg-white border rounded-md">
                        @foreach (\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                {{ ucwords($category->name) }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
            {{-- <input type="hidden" name="state" :value="st" /> --}}
            </x-form.field>
            <div class="flex">
                <x-form.button name="state" value="pub">
                    Publish
                </x-form.button>
                <x-form.button name="state" value="draft" class="ml-4 bg-white text-gray-700 uppercase font-semibold text-xs py-2 px-10 rounded-2xl border border-gray-200 hover:bg-blue-100">
                    Save Draft
                </x-form.button>
            </div>
        </form>
    </x-setting>
</x-layout>
