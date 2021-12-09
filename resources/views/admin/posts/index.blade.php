<x-layout>
    <x-setting heading="Manage Posts">
        <div class="flex flex-col bg-white">
        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                <table class="min-w-full divide-y divide-gray-200">
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($posts as $post)
                    <tr>
                        <td class="px-6 py-4">
                            <div class="ml-4">
                                <div class="text-sm font-medium text-gray-900">
                                    <a href="/posts/{{ $post->slug }}">
                                        {{ $post->title }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4 text-center">
                        @if ($post->state == 'pub')
                        
                        <form action="/admin/posts/{{ $post->id }}/draft" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                            <button type="submit" name="state" value="draft" id="{{ $post->id }}"
                                x-data="{ poked: false }"
                                class="inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"
                                :class="poked
                                    ? 'px-1 shadow-none'
                                    : 'px-2 shadow'"
                                x-on:touchstart="poked = true"
                                x-on:touchend="poked = false"
                                x-on:mousedown="poked = true"
                                x-on:mouseup="poked = false"
                            >Published</button>
                        </form>

                        @elseif ($post->state == 'draft')
                        <form action="/admin/posts/{{ $post->id }}/pub" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PATCH')

                            <button type="submit" name="state" value="pub" id="{{ $post->id }}" 
                                x-data="{ poked: false }"
                                class="inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800"
                                :class="poked
                                    ? 'px-1 shadow-none'
                                    : 'px-2 shadow'"
                                x-on:touchstart="poked = true"
                                x-on:touchend="poked = false"
                                x-on:mousedown="poked = true"
                                x-on:mouseup="poked = false">
                            Draft
                        </button>
                        </form>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-right text-sm font-medium">
                        <a href="/admin/posts/{{ $post->id }}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                    </td>
                    </td>
                    <td class="px-6 py-4 text-right text-sm font-medium">
                        <form method="POST" action="/admin/posts/{{ $post->id }}">
                            @csrf
                            @method('DELETE')

                            <button class="text-xs color-gray-400">Delete</button>
                        </form>
                    </td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
        {{ $posts->links() }}
    </x-setting>
</x-layout>