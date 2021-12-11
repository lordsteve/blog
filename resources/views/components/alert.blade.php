@if (session()->has('alert'))
    <div x-data="{ pokedyes: false, pokedno: false, open: true }" x-show="open" 
        class="backdrop-filter backdrop-blur-sm w-screen h-screen fixed inset-0 z-40 overflow-auto flex fade">
        <div x-on:click.away="open = false"
            class="z-50 filter-none inset-0 w-96 bg-gradient-to-br from-indigo-50 via-white to-white border border-gray-800 m-auto rounded-xl py-auto p-4 text-center flex flex-wrap shadow-lg">
            <span class="center font-semibold mx-auto py-4">{{ session('alert.message') }}</span>
            <button x-on:click="open = false" {{ session('alert.blue-action') }}
                class="bg-blue-200 h-10 w-24 m-auto grow border border-blue-800 rounded-full text-blue-800"
                :class="pokedyes
                    ? 'w-20 shadow-none'
                    : 'w-24 shadow'"
                x-on:touchstart="pokedyes = true"
                x-on:touchend="pokedyes = false"
                x-on:mousedown="pokedyes = true"
                x-on:mouseup="pokedyes = false"
            >{{ session('alert.blue') }}</button>
            <button x-on:click="open = false" {{ session('alert.red-action') }}
                class="bg-red-200 h-10 w-24 grow m-auto border border-red-800 rounded-full text-red-800"
                :class="pokedno
                    ? 'w-20 shadow-none'
                    : 'w-24 shadow'"
                x-on:touchstart="pokedno = true"
                x-on:touchend="pokedno = false"
                x-on:mousedown="pokedno = true"
                x-on:mouseup="pokedno = false"
            >{{ session('alert.red') }}</button>
        </div>
    </div>
@endif