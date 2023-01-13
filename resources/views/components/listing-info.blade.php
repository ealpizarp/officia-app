@props(['listing', 'address'])
<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.2/flowbite.min.js"></script>

<div class="ml-10 mt-5">

    <div class="flex flex-col lg:text-left justify-between lg:flex lg:flex-row">
        <div class="hidden lg:flex lg:flex-col w-1/2">
            <h2 class="text-2xl mb-2 font-bold mb-10">{{ $listing->name }}</h2>
            <p class="text-xl mb-4 text-gray-500">
                {{ $listing->description }}
            </p>
        </div>

        <div class="flex flex-col items-center lg:w-1/2">

            <div id="default-carousel" class="relative w-3/4" data-carousel="static">
                <!-- Carousel wrapper -->
                <div id="carousel-container" class="relative h-56 overflow-hidden rounded-xl md:h-96 md:rounded-2xl">
                    <!-- Item 1 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <span
                            class="absolute text-2xl font-semibold text-white -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2 sm:text-3xl dark:text-gray-800">First
                            Slide</span>
                        <img src="https://images.pexels.com/photos/414191/pexels-photo-414191.jpeg"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                    </div>
                    <!-- Item 2 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="https://images.pexels.com/photos/414191/pexels-photo-414191.jpeg"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                    </div>
                    <!-- Item 3 -->
                    <div class="hidden duration-700 ease-in-out" data-carousel-item>
                        <img src="{{asset('storage/images/UEoZRXiHzxRiIMHuZpL9V6XrXozFz8E6MWSh8C8w.jpg')}}"
                            class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2"
                            alt="...">
                    </div>
                </div>
                <!-- Slider indicators -->
                <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 1"
                        data-carousel-slide-to="0"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                        data-carousel-slide-to="1"></button>
                    <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                        data-carousel-slide-to="2"></button>
                </div>
                <!-- Slider controls -->
                <button type="button"
                    class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-prev>
                    <span
                        class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                            </path>
                        </svg>
                        <span class="sr-only">Previous</span>
                    </span>
                </button>
                <button type="button"
                    class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                    data-carousel-next>
                    <span
                        class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                        <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800"
                            fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                        <span class="sr-only">Next</span>
                    </span>
                </button>
            </div>

            <div class="flex flex-col items-center jutify-center mt-10">

                <h3 class="text-center text-2xl font-bold mb-5 lg:hidden">{{ $listing->name }}</h3>

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
                            <i class="text-green-600 fa-solid fa-circle-check"></i>
                        @else
                            <i class="text-red-600 fa-solid fa-circle-xmark"></i>
                        @endif
                    </p>

                    <div class="flex items-center text-md text-center text-gray-400">
                        <i class="fa-solid fa-shield mr-2"></i><b>Warranty</b>
                    </div>

                    <p class="my-2 text-black">
                        @if ($listing->warranty == 1)
                            <i class="text-green-600 fa-solid fa-circle-check"></i>
                        @else
                            <i class="text-red-600 fa-solid fa-circle-xmark"></i>
                        @endif
                    </p>


                </div>
            </div>


            <div class="text-center">
                <p class="text-lg text-gray-500 mt-8 space-y-6 lg:hidden"> {{ $listing->description }} </p>
            </div>
        </div>
    </div>
</div>

<style>

    #default-carousel {
    
        z-index: 3;
    }


</style>
