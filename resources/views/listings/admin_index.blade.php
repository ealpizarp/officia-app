@extends('admin_layout')


@section('content')
@include('partials._search')

@include('partials._listings', ['listings', $listings])

{{-- @include('partials._popularCategories', ['listings', $listings]) --}}


@endsection
