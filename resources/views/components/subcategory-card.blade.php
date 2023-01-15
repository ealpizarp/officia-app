@props(['subcategory'])

<x-card>
    <div class="flex justify-between">
        {{-- <img class="hidden w-48 mr-6 rounded-lg xl:block"
            src={{ $listing->image ? asset('storage/' . $listing->image) : asset('./images/no-image.png') }}
            alt="" /> --}}
        <div class="flex flex-col lg:flex-row justify-between gap-x-10">
            <div class="flex w-auto">
                <h3
                    class="flex text-lg text-center items-center text-zinc-600 hover:text-cyan-600 transition duration-300 font-bold dark:text-gray-200 dark:hover:text-cyan-500">
                    <a href="/?subcategory={{$subcategory->name}}">{{ $subcategory->name }}</a>
                </h3>
            </div>
            {{-- <div
                class="w-56 overflow-hidden flex gap text-md text-center items-center text-zinc-600 hover:text-cyan-600 transition duration-300">
                <i class="fa-solid fa-envelope mr-1.5"></i> {{ $subcategory->category->name }}
            </div> --}}

        </div>
        {{-- <img class="hidden w-48 ml-6 rounded-lg lg:block"
        src={{ $listing->image ? asset('storage/' . $listing->image) : asset('./images/no-image.png') }}
        alt="" /> --}}
    </div>
</x-card>
