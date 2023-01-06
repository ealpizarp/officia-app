@extends('guest_layout')

@section('content')

    <x-back-button></x-back-button>

    <x-listing-info :listing=$listing> </x-listing-info>

    {{-- <x-comments :listing=$listing> </x-comments> --}}

@endsection
