@extends('admin_layout')

@section('content')

    <x-back-button></x-back-button>

    <x-listing-info :listing=$listing :address=$address> </x-listing-info>

    {{-- <x-comments :listing=$listing> </x-comments> --}}
    

    <x-business-owner-info :listing=$listing :starsAverage=$stars_average> </x-business-owner-info>

        <x-card class="mt-4 p-2 flex space-x-6">
            <a href="/listings/{{ $listing->id }}/edit">
                <i class="fa-solid fa-pencil"></i> Edit
            </a>

            <form method="POST" action="/listings/{{ $listing->id }}">
                @csrf
                @method('DELETE')
                <button class="text-red-500"><i class="fa-solid fa-trash"></i>
                    Delete</button>
            </form>

        </x-card>

   

@endsection
