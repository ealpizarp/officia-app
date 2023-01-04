@extends('guest_layout')

@section('content')

    <a href="/" class="inline-block text-black ml-4 mb-2 mt-2"><i class="fa-solid fa-arrow-left"></i> Back
    </a>
    <div class="mx-4 mt-5">

            <div class="flex flex-col lg:text-left justify-between lg:flex lg:flex-row">


            <div class="hidden lg:flex lg:flex-col w-1/2">
                    <h2 class="text-2xl mb-2 font-bold mb-10">{{ $listing->title }}</h2>
                    <p class="text-xl mb-4">
                         {{ $listing->description }}
                    </p>
            </div>

            <div class="flex flex-col items-center lg:w-1/2">
                <x-card class="mr-6 mb-6">
                <img class="w-80  rounded-md"
                    src="{{ $listing->image ? asset('storage/' . $listing->image) : asset('./images/no-image.png') }}"
                    alt="" />
                </x-card>

                <h3 class="text-center text-2xl mb-2 lg:hidden">{{ $listing->title }}</h3> 
                <x-listing-tags :tagsCsv='$listing->tags' />
                <div class="text-lg my-4 text-center">
                    <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
                </div>
                <div class="text-center">
                    <p class="text-lg space-y-6 lg:hidden"> {{ $listing->description }} </p>
                </div>
            </div>
        </div>

        
        <div class="container">
            <div class="row justify-content-center mt-10">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="font-bold leading-tight text-gray-700 text-2xl mt-0 mb-4">Users comments</h4>
                            @foreach ($listing->comments as $comment)
                                <div class="display-comment">
                                    <strong class='mt-2 mb-1 text-teal-600'>{{ $comment->user->name }}</strong>
                                    <p class='mb-2 text-gray-700'>{{ $comment->body }}</p>
                                </div>
                            @endforeach

                        </div>
                        <form class="bg-white shadow-md rounded px-2 pt-6 pb-8 mb-4 py-5 border-slate-400 w-auto" method="post"
                        action="{{ route('comment.add') }}">
                        @csrf
                        <div class="form-group border-slate-400">
                            <input type="text" name="comment_body"
                                class="form-control w-full bg-gray-100 rounded h-10" />
                            <input type="hidden" name="listing_id" value="{{ $listing->id }}" />
                        </div>
                        <div class="form-group">
                            <input type="submit"
                                class="bg-cyan-700 hover:bg-cyan-600 text-white font-bold py-2 px-4 mt-5 rounded"
                                value="Add Comment" />
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>


@endsection
