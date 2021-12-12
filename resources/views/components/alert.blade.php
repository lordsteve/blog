@if (session()->has('alert'))
    <div x-data="{ open: true }" x-show="open" 
        class="backdrop-filter backdrop-blur-sm w-screen h-screen fixed inset-0 z-40 overflow-auto flex fade">
        <div x-on:click.away="open = false"
            class="z-50 filter-none inset-0 w-96 bg-gradient-to-br from-indigo-50 via-white to-white border border-gray-800 m-auto rounded-xl py-auto p-4 text-center flex justify-evenly flex-wrap shadow-lg">
            <span class="center font-semibold mx-auto py-4">{{ session('alert.message') }}</span>
            <button x-on:click="open = false" {{ session('alert.blue-action') }}
                class="bg-blue-200 py-1 border border-blue-800 rounded-full text-blue-800 bg-gradient-to-tl from-blue-300 via-transparent to-transparent px-11 shadow-lg active:shadow-md active:scale-95 active:translate-y-1"
            >{{ session('alert.blue') }}</button>
            <button x-on:click="open = false" {{ session('alert.red-action') }}
                class="bg-red-200 py-1 border border-red-800 rounded-full text-red-800 bg-gradient-to-tl from-red-300 via-transparent to-transparent px-11 shadow-lg active:shadow-md active:scale-95 active:translate-y-1"
            >{{ session('alert.red') }}</button>
        </div>
    </div>
@endif