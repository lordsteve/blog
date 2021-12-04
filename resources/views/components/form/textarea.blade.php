@props(['name', 'rows' => '', 'placeholder' => ''])

<x-form.field>
    <x-form.label name="{{ $name }}" />
        <textarea class="border border-gray-200 rounded p-2 w-full" style="resize:none"
            name="{{ $name }}"
            id="{{ $name }}"
            placeholder="{{ $placeholder }}"
            rows="{{ $rows }}"
            required>
            {{ old('$name') }}
        </textarea>
    <x-form.error name="{{ $name }}" />
</x-form.field>
