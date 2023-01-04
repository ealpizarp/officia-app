@extends('admin_layout')

@section('content')

    <a href="/dashboard" class="inline-block text-black ml-4 mb-2 mt-2"><i class="fa-solid fa-arrow-left"></i> Back
    </a>

    <x-listing-info :listing=$listing> </x-listing-info>

    <x-comments :listing=$listing> </x-comments>

        <x-card class="mt-4 p-2 flex space-x-6">
            <a href="/listings/{{ $listing->id }}/edit">
                <i class="fa-solid fa-pencil"></i> Edit
            </a>

            <form method="POST" action="/listings/{{ $listing->id }}">
                @csrf
                @method('DELETE')
                <button class="text-red-500"><i class="fa-solid fa-trash"></i>
                    Delete</button>
            </form>

        </x-card>

@endsection
