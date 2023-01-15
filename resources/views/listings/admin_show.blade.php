@extends('admin_layout')

@section('content')
    <div class="flex flex-row justify-between">

        <x-back-button></x-back-button>

        <x-report-modal :listing=$listing></x-report-modal>

    </div>

    <x-listing-info :listing=$listing :address=$address> </x-listing-info>


    <div class="flex flex-col lg:flex-row justify-between items-center mt-28 mb-28">

        <x-business-owner-info :listing=$listing> </x-business-owner-info>

        <x-review-summary :starsAverage=$stars_average :numReviews=count($reviews)></x-review-summary>

    </div>

    <x-comments :reviews=$reviews> </x-comments>

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
