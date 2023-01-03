@extends('guest_layout')


@section('content')
@include('partials._hero')


    <div class="lg:grid-cols-3 md:grid md:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

        @unless(count($listings) == 0)
            @foreach ($listings as $listing)
                <x-listing-card :listing="$listing"/>
            @endforeach
        @else
            <p>No listings found</p>
        @endunless
    </div>
    <div class="mt-6 p-4">
        {{$listings->links()}}
    </div>

 

{{-- @include('partials._contact') --}}



@endsection
