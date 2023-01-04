<div>

    @unless(count($listings) == 0)

    <div class="2xl:grid-cols-3 md:grid md:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
            @foreach ($listings as $listing)
                <x-listing-card :listing="$listing"/>
            @endforeach
    </div>

    @else

    <h2 class="block text-lg text-center font-bold text-gray-700 ">No services found</h2>

    @endunless

</div>

{{-- <div class="mt-6 p-4">
    {{$listings->links()}}
</div> --}}