@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
        class="fixed top-1 left-1/2 transform -translate-x-1/2 
         bg-cyan-800 text-white rounded px-4 py-1">
        <p class="font-medium  text-2xl">
            {{ session('message') }}
        </p>
    </div>
@endif
