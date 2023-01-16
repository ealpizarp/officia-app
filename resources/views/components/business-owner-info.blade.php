@props(['listing'])


<div class="relative mx-10 w-3/4 lg:w-1/2 mt-20 min-w-0 break-words bg-gray-100 w-full mb-6 shadow-lg rounded-xl dark:bg-gray-600">
    <div class="px-6">
        <div class="flex flex-wrap justify-start">
            <div class="w-full flex justify-center">
                <div class="relative">
                    <img src={{ $listing->user->profile_photo ? asset('storage/' . $listing->user->profile_photo) : asset('./images/profile_template.png') }}
                        class="shadow-xl rounded-full align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-[150px]" />
                </div>
            </div>

        </div>
        <div class="text-center mt-24">
            <a href="/users/{{$listing->user->id}}">
            <h3 class="text-2xl text-gray-700 font-bold leading-normal mb-1 dark:text-gray-300 transition duration-300 hover:text-cyan-600">{{ $listing->user->name }}
                {{ $listing->user->last_names }}</h3>
            </a>
            <div class="text-md mt-0 mb-2 text-lime-600 font-bold uppercase dark:text-lime-400">
                @if ($listing->user->verification_photo)
                    <i class="fa-solid fa-certificate  opacity-75 mr-1.5"></i> Verified
                @endif
            </div>
        </div>
        <div class="mt-6 py-6 border-t border-slate-200 text-center dark:border-gray-300">
            <div class="flex flex-wrap justify-center">
                <div class="w-full px-4">
                    <p class="font-medium leading-relaxed text-slate-600 mb-4 dark:text-gray-300">{{ $listing->reasons_to_choose }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
