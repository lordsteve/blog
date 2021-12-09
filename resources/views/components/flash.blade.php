@if (session()->has('success'))
    <div x-data="{ show:true }"
            x-init="setTimeout(() => show = false, 4000)"
            x-show="show"
            class="fixed bg-blue-500 text-white py-4 px-10 rounded-xl bottom-3 right-3 shadow">
        <p>{{ session('success') }}</p>
    </div>
@endif
