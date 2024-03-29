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
                        <x-pubunpub-button :post="$post" />
                    </td>
                    <td class="px-6 py-4 text-right text-sm font-medium">
                        <a href="/admin/posts/{{ $post->id }}/edit" class="text-blue-500 hover:text-blue-600">Edit</a>
                    </td>
                    </td>
                    <td class="px-6 py-4 text-right text-sm font-medium">
                        <form method="POST" id="{{ 'delete' . $post->id }}" action="/admin/posts/{{ $post->id }}">
                            @csrf
                            @method('DELETE')
                        </form>
                        <a href="/admin/posts/{{ $post->id }}/alert" class="text-xs color-gray-400">Delete</a>
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