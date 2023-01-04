@props(['listing'])

<x-card>
    <div class="flex">
        <img class="hidden w-48 mr-6 rounded-lg lg:block"
            src={{ $listing->image ? asset('storage/' . $listing->image) : asset('./images/no-image.png') }}
            alt="" />
        <div>
            <h3 class="text-xl text-zinc-600 hover:text-cyan-600 transition duration-300 font-bold">
                @auth
                @if (\Auth::user()->hasRole('admin'))
                <a href="/listings/admin/{{ $listing->id }}">{{ $listing->title }}</a>
                @elseif (\Auth::user()->hasRole('user'))
                <a href="/listings/user/{{ $listing->id }}">{{ $listing->title }}</a>
                @endif
                @else
                <a href="/listings/{{ $listing->id }}">{{ $listing->title }}</a>
                @endauth

            </h3>
            <div class="text-md text-zinc-500 mt-4">Seller: {{ $listing->seller }}</div>
            <div class="text-md text-zinc-500 mb-4">Price: ${{ $listing->price }}</div>
            <x-listing-tags :tagsCsv="$listing->tags" />
            <div class="text-lg mt-4 text-red-700">
                <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
            </div>
        </div>
        <img class="hidden w-48 ml-6 rounded-lg md:block lg:hidden"
        src={{ $listing->image ? asset('storage/' . $listing->image) : asset('./images/no-image.png') }}
        alt="" />
    </div>
</x-card>
