@extends('user_layout')

@section('content')

    <a href="/user" class="inline-block text-black ml-4 mb-2 mt-2"><i class="fa-solid fa-arrow-left"></i> Back
    </a>

    <x-listing-info :listing=$listing> </x-listing-info>

    <x-comments :listing=$listing> </x-comments>


@endsection
