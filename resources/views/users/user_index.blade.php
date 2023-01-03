@extends('user_layout')

@section('content')

<div class="mt-5 grid grid-cols-1 gap-2 space-y-2 mx-4">

    @unless(count($users) == 0)
        @foreach ($users as $user)
            <x-user-card :user="$user"/>
        @endforeach
    @else
        <p>No users found</p>
    @endunless
</div>

<div class="mt-6 p-4">
    {{$users->links()}}
</div>

@endsection