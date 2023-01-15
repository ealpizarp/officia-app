@extends('admin_layout')

@section('content')
@include('partials._reports', ['reports', $reports])


@endsection