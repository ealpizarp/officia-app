@extends('admin_layout')

@section('content')
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Publish property AD
            </h2>
            <p class="mb-4">Post a gig to find a developer</p>
        </header>

        <form method="POST" action="/listings" enctype="multipart/form-data">
            @csrf
            <div class="mb-6">
                <label for="seller" class="inline-block text-lg mb-2">Seller Name</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="seller"
                    value="{{ old('seller') }}" />

                @error('seller')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>



            <div class="mb-6">
                <label for="title" class="inline-block text-lg mb-2">Ad Title</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="title"
                    value="{{ old('title') }}" placeholder="Example: Beautiful house for rent />

                @error('title')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>


            <div class="mb-6">
                <label for="price" class="inline-block text-lg mb-2">Price</label>
                <input type="number" class="border border-gray-200 rounded p-2 w-full" name="price"
                    value="{{ old('price') }}" />

                @error('price')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-6">
                <label for="location" class="inline-block text-lg mb-2">Location</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="location"
                    value="{{ old('location') }}" placeholder="Example: Remote, Boston MA, etc" />

                @error('location')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>


            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Contact Email</label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="email"
                    value="{{ old('email') }}" />


                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="tags" class="inline-block text-lg mb-2">
                    Tags (Comma Separated)
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="tags"
                    placeholder="Example: 2 bedrooms, Air conditioning, Garage, etc.." value="{{ old('tags') }}" />


                @error('tags')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-6">
                <label for="image" class="inline-block text-lg mb-2">
                    Property image
                </label>
                <input type="file" class="border border-gray-200 rounded p-2 w-full" name="image" />

                @error('image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="description" class="inline-block text-lg mb-2">
                    Propery Description
                </label>
                <textarea class="border border-gray-200 rounded p-2 w-full" name="description" rows="10" {{ old('seller') }}
                    placeholder="Include tasks, requirements, salary, etc"></textarea>

                @error('description')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>



            <div class="mb-6">
                <button class="bg-cyan-700 text-white rounded py-2 px-4 hover:bg-cyan-600 transition duration-300">
                    Publish Ad
                </button>

                <a href="/dashboard" class="text-black ml-4"> Back </a>
            </div>
        </form>
    </x-card>
@endsection
