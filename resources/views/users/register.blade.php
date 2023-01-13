@extends('guest_layout')

@section('content')


<x-card class="p-10 max-w-lg mx-auto mt-24">
<header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1">
        Register
    </h2>
    <p class="mb-4">Create an account to publish your service</p>
</header>
<meta name="_token" content="{{csrf_token()}}"></meta>

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
        <label for="legal_id" class="inline-block text-lg mb-2">
            Identification number
        </label>
        <input
            type="number"
            class="border border-gray-200 rounded p-2 w-full"
            name="legal_id"
            value="{{old('legal_id')}}"
        />
        @error('legal_id')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    </div>

    <div class="mb-6">
        <label for="province_id" class="inline-block text-lg mb-2">
            Province
        </label>
        <select id="province" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
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

        
        <label for="address_id" class="inline-block text-lg mb-2">
            County
        </label>
        <select id="county" name="address_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option>Select county</option>
        </select>
        @error('address_id')
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
        <label for="profile_image" class="inline-block text-lg mb-2">
             Profile photo
        </label>
        <div class="flex items-center justify-center w-full">
            <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                    <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                </div>
                <input name="profile_image" id="dropzone-file" type="file" class="hidden" />
            </label>
        </div> 
        @error('profile_image')
            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script>
    $.ajaxSetup({
         headers: {
            'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
         }
   });

   $(document).ready(function(){
        $("#province").change(function(){
            var province_id = $(this).val();

            if (province_id == "") {
                var province_id = 0;
            } 

            $.ajax({
                url: '{{ url("/address/") }}/'+province_id,
                type: 'get',
                dataType: 'json',
                success: function(response) {             
                    console.log(response);       
                    $('#county').find('option:not(:first)').remove();

                    if (response['addresses'].length > 0) {
                        $.each(response['addresses'], function(key,value){
                            $("#county").append("<option value='"+value['id']+"'>"+value['name']+"</option>")
                        });
                    } 
                }
            });            
        });

   });
</script>

<script type="text/javascript">

    $(document).ready(function() {
        $("#province").on("change", function() {
            var province_id = $(this).val();
        });
        document.cookie = "province_id=" + province_id
    });
</script>

