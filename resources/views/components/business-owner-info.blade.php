@props(['listing', 'starsAverage'])

<div class="flex flex-row justify-between mt-28 mb-28">

    <div
        class="relative mx-10 max-w-md md:max-w-2xl mt-20 min-w-0 break-words bg-gray-100 w-full mb-6 shadow-lg rounded-xl mt-16">
        <div class="px-6">
            <div class="flex flex-wrap justify-start">
                <div class="w-full flex justify-center">
                    <div class="relative">
                        <img src="https://placeimg.com/192/192/people"
                            class="shadow-xl rounded-full align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-[150px]" />
                    </div>
                </div>

            </div>
            <div class="text-center mt-24">
                <h3 class="text-2xl text-slate-700 font-bold leading-normal mb-1">{{ $listing->user->name }}
                    {{ $listing->user->last_names }}</h3>
                <div class="text-xs mt-0 mb-2 text-slate-400 font-bold uppercase">
                    <i class="fas fa-star text-slate-400 opacity-75 mr-1.5"></i>Rating
                </div>
            </div>
            <div class="mt-6 py-6 border-t border-slate-200 text-center">
                <div class="flex flex-wrap justify-center">
                    <div class="w-full px-4">
                        <p class="font-light leading-relaxed text-slate-600 mb-4">{{ $listing->reasons_to_choose }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-review-summary :starsAverage=$starsAverage></x-review-summary>


</div>
