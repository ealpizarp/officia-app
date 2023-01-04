@extends('user_layout')


@section('content')
@include('partials._hero')


@include('partials._listings', ['listings', $listings])


@endsection