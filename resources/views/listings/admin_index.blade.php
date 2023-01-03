@extends('admin_layout')


@section('content')
@include('partials._search')

@include('partials._listings', ['listings', $listings])


@endsection
