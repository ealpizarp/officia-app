@props(['listing'])

<div class="mx-4 mt-10">

    <div class="flex flex-col lg:text-left justify-between lg:flex lg:flex-row">


    <div class="hidden lg:flex lg:flex-col w-1/2">
            <h2 class="text-2xl mb-2 font-bold mb-10">{{ $listing->title }}</h2>
            <p class="text-xl mb-4 text-gray-500">
                 {{ $listing->description }}
            </p>
    </div>

    <div class="flex flex-col items-center lg:w-1/2">
        <x-card class="mr-6 mb-6">
        <img class="w-80  rounded-md"
            src="{{ $listing->image ? asset('storage/' . $listing->image) : asset('./images/no-image.png') }}"
            alt="" />
        </x-card>

        <h3 class="text-center text-2xl mb-2 lg:hidden">{{ $listing->title }}</h3> 

        <div class="grid grid-cols-2 content-start">

            <div class="text-md my-4 text-center text-gray-400"> 
                <i class="fa-solid fa-location-dot mr-1"></i><b class="mr-16">Location</b>  
            </div>
            
            <p class="my-4 text-black"> {{ $listing->location }} </p>

            <div class="text-md my-4 text-center text-gray-400"> 
                <i class="fa-solid fa-border-all mr-1"></i><b class="mr-16">Category</b>
            </div>

        </div>

        
        <div class="text-center">
            <p class="text-lg space-y-6 lg:hidden"> {{ $listing->description }} </p>
        </div>
    </div>
</div>