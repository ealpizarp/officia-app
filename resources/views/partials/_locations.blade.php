<div class="mt-5 grid grid-cols-2 md:grid-cols-3 gap-4 mx-4">

    @unless(count($addresses) == 0)
        @foreach ($addresses as $location)
            <x-location-card :location="$location"/>
        @endforeach
    @else
        <p>No locations found</p>
    @endunless
</div>

<div class="mt-6 p-4">
    {{$addresses->links()}}
</div>
