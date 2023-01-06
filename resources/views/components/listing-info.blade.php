@props(['listing', 'address'])

<div class="mx-4 mt-5">

    <div class="flex flex-col lg:text-left justify-between lg:flex lg:flex-row">
    <div class="hidden lg:flex lg:flex-col w-1/2">
            <h2 class="text-2xl mb-2 font-bold mb-10">{{ $listing->name }}</h2>
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

        <h3 class="text-center text-2xl mb-2 lg:hidden">{{ $listing->name }}</h3> 

        <div class="grid grid-cols-2 gap-x-16 justify-items-start">

            <div class="flex items-center text-md text-center text-gray-400 "> 
                <i class="fa-solid fa-location-dot mr-2"></i><b>Location</b>  
            </div>
            
            <p class="my-2 text-black"> {{ $listing->address->name }} </p>
            
            <div class="flex items-center text-md text-center text-gray-400"> 
                <i class="fa-solid fa-border-all mr-2"></i><b>Category</b>
            </div>
            <p class="my-2 text-black"> {{ $listing->subcategory->name }} </p>

            <div class="flex items-center text-md text-center text-gray-400"> 
                <i class="fa-solid fa-magnifying-glass mr-2"></i><b>Free diagnosis</b>
            </div>

            <p class="my-2 text-black"> 
            @if ($listing->free_diagnosis == 1)
            <i class="text-green-700 fa-solid fa-circle-check"></i>
            @else
            <i class="text-red-700 fa-solid fa-circle-xmark"></i>
            @endif
            </p>

            <div class="flex items-center text-md text-center text-gray-400"> 
                <i class="fa-solid fa-shield mr-2"></i><b>Warranty</b>
            </div>

            <p class="my-2 text-black"> 
            @if ($listing->free_diagnosis == 1)
            <i class="text-green-700 fa-solid fa-circle-check"></i>
            @else
            <i class="text-red-700 fa-solid fa-circle-xmark"></i>
            @endif
            </p>


        </div>
       
        
        <div class="text-center">
            <p class="text-lg space-y-6 lg:hidden"> {{ $listing->description }} </p>
        </div>
    </div>
</div>