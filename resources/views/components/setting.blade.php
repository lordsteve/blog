@props(['heading'])

<section class="py-8 max-w-4xl bg-gray-200 p-4 border border-gray-400 rounded-xl mx-auto shadow-xl">
    <h1 class="text-lg font-bold mb-4 text-center">
        {{ $heading }}
    </h1>

    <div class="flex">
        <aside class="w-48 flex-shrink-0">
            <h4 class="font-semibold mb-4">Links</h4>
<hr class="border-black shadow">
            <ul>
                <li>
                    <a href="/admin/posts" class="{{ request()->is('admin/posts') ? 'text-blue-500' : '' }}">Manage Posts</a>
                </li>
                <li>
                    <a href="/admin/posts/create"
                        class="{{ request()->is('admin/posts/create') ? 'text-blue-500' : '' }}">New Post</a>
                </li>
            </ul>
        </aside>

        <main class="flex-1 bg-white rounded-xl border border-gray-400 shadow-inner">
            <x-panel>
                {{ $slot }}
            </x-panel>
        </main>
    </div>
</section>
