@extends('guest_layout')


@section('content')
@include('partials._hero')


<div>

    @unless(count($service) == 0)

    <div class="2xl:grid-cols-3 md:grid md:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">
            @foreach ( $service as $eachService)
                

                {{dd($eachService)}}
                
            @endforeach
    </div>

    @else

    <h2 class="block text-lg text-center font-bold text-gray-700 ">No services found</h2>

    @endunless

</div>
@endsection