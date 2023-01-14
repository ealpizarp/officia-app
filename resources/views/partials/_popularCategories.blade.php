

<div class="flex flex-row">

    <div class="flex p-5 space-y-10">
        <h2 class="font-bold mb-10">Popular Categories</h2>
    </div>

    <div class="mt-5 grid grid-cols-6 gap-4 mx-4">

        @unless(count($subcategories) == 0)
            @foreach ($subcategories as $subcategory)
                @if ($loop->count < 6)
                    <x-subcategory-card :subcategory="$subcategory" />
                @endif
            @endforeach
        @else
            <p>No current popular categories</p>
        @endunless
    </div>

</div>
