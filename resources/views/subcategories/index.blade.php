@extends('guest_layout')

@section('content')
@include('partials._subcategories', ['subcategories', $subcategories])


@endsection