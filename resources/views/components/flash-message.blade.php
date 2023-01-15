@if (session()->has('message'))
    <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show"
        class="fixed top-2 z-30 left-1/2 transform -translate-x-1/2 
         bg-cyan-600 text-white rounded-xl px-4 py-1">
        <p class="font-medium  text-2xl">
            {{ session('message') }}
        </p>
    </div>
@endif
