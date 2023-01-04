@extends('guest_layout')

@section('content')

@include('partials._users', ['users', $users])

@endsection