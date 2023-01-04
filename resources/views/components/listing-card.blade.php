@props(['listing'])

<x-card>
    <div class="flex justify-between">
        {{-- <img class="hidden w-48 mr-6 rounded-lg lg:block"
            src={{ $listing->image ? asset('storage/' . $listing->image) : asset('./images/no-image.png') }}
            alt="" /> --}}
        <div>
            <h3 class="text-xl text-zinc-600 hover:text-cyan-600 transition duration-300 font-bold">
                @auth
                @if (\Auth::user()->hasRole('admin'))
                <a href="/listings/admin/{{ $listing->id }}">{{ $listing->name }}</a>
                @elseif (\Auth::user()->hasRole('user'))
                <a href="/listings/user/{{ $listing->id }}">{{ $listing->name }}</a>
                @endif
                @else
                <a href="/listings/{{ $listing->id }}">{{ $listing->name }}</a>
                @endauth

            </h3>
            {{-- <div class="text-lg text-zinc-600 mb-4">Category {{ $listing->subcategory->name }}</div> --}}
            <div class="text-md text-zinc-600 mt-4"> 
                <i class="fa-solid fa-rocket"></i> Category <b class="ml-4">{{$listing->subcategory->name}}</b>
            </div>
            <div class="text-md text-zinc-600 mt-4"> 
                <i class="fa-solid fa-magnifying-glass"></i> Free diagnosis <b class="ml-4">
                    @if ($listing->free_diagnosis == 1)
                    <i class="fa-solid fa-circle-check"></i>
                    @else
                    <i class="fa-solid fa-circle-xmark"></i>
                    @endif
                </b>
            </div>
            <div class="text-lg mt-4 text-red-700">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->address->name }}
            </div>
        </div>
        <img class="hidden w-48 ml-6 rounded-lg lg:block"
        src={{ $listing->image ? asset('storage/' . $listing->image) : asset('./images/no-image.png') }}
        alt="" />
    </div>
</x-card>
