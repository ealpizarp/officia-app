@extends('guest_layout')

@section('content')
@include('partials._locations', ['addresses', $addresses])


@endsection