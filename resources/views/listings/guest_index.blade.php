@extends('guest_layout')


@section('content')
@include('partials._hero')

@include('partials._listings', ['listings', $listings])


{{-- @include('partials._contact') --}}



@endsection
