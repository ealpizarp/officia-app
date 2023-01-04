@extends('guest_layout')

@section('content')

<x-card class="p-10 max-w-lg mx-auto mt-24">
<header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1">
        Register
    </h2>
    <p class="mb-4">Create an account to publish your service</p>
</header>

<form method="POST" action="/users">
    @csrf
    <div class="mb-6">
        <label for="name" class="inline-block text-lg mb-2">
            Name
        </label>
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="name"
            value="{{old('name')}}"
        />
        @error('name')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="last_names" class="inline-block text-lg mb-2">
            Last name
        </label>
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="last_names"
            value="{{old('last_names')}}"
        />
        @error('last_names')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="phone_number" class="inline-block text-lg mb-2">
            Phone number
        </label>
        <input
            type="number"
            class="border border-gray-200 rounded p-2 w-full"
            name="phone_number"
            value="{{old('phone_number')}}"
        />
        @error('phone_number')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="province_id" class="inline-block text-lg mb-2">
            Province
        </label>
        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="province_id">
            <option>Select province</option>
            @foreach ($provinces as $province)
                <option value="{{ $province->id }}"> 
                    {{ $province->name }} 
                </option>
            @endforeach    
        </select>
        @error('province_id')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="county_id" class="inline-block text-lg mb-2">
            County
        </label>
        <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="province_id">
            <option>Select county</option>
            @foreach ($counties as $county)
                <option value="{{ $county->id }}" {{ ( $county->id ) ? 'selected' : '' }}> 
                    {{ $county->name }} 
                </option>
            @endforeach    
        </select>
        @error('province_id')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="email" class="inline-block text-lg mb-2"
            >Email</label
        >
        <input
            type="email"
            class="border border-gray-200 rounded p-2 w-full"
            name="email"
            value="{{old('email')}}"
        />
        <!-- Error Example -->
        @error('email')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    
    </div>

    <div class="mb-6">
        <label
            for="password"
            class="inline-block text-lg mb-2"
        >
            Password
        </label>

        <input
            type="password"
            class="border border-gray-200 rounded p-2 w-full"
            name="password"
        />
        @error('password')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror


    </div>

    <div class="mb-6">
        <label
            for="password_confirmation"
            class="inline-block text-lg mb-2"
        >
            Confirm Password
        </label>
        <input
            type="password"
            class="border border-gray-200 rounded p-2 w-full"
            name="password_confirmation"
        />
        @error('password_confirmation')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    
    </div>

    <div class="mb-6">
        <button
            type="submit"
            class="bg-cyan-700 text-white rounded py-2 px-4 hover:bg-cyan-600 transition duration-300"
        >
            Sign Up
        </button>
    </div>

    <div class="mt-8">
        <p>
            Already have an account?
            <a href="/login" class="text-cyan-600"
                >Login</a
            >
        </p>
    </div>
</form>
</x-card>

@endsection