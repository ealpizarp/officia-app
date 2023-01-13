
<div class="mt-5 grid grid-cols-2 lg:grid-cols-3 gap-2 space-y-2 mx-4">

    @unless(count($subcategories) == 0)
        @foreach ($subcategories as $subcategory)
            <x-subcategory-card :subcategory="$subcategory"/>
        @endforeach
    @else
        <p>No subcategories found</p>
    @endunless
</div>

<div class="mt-6 p-4">
    {{$subcategories->links()}}
</div>
