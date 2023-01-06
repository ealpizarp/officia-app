@extends('guest_layout')

@section('content')


<x-card class="p-10 max-w-lg mx-auto mt-24">
<header class="text-center">
    <h2 class="text-2xl font-bold uppercase mb-1">
        Edit User
    </h2>
</header>
<meta name="_token" content="{{csrf_token()}}"></meta>

<form method="POST" action="/users/{{$user->id}}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="mb-6">
        <label for="name" class="inline-block text-lg mb-2">
            Name
        </label>
        <input
            type="text"
            class="border border-gray-200 rounded p-2 w-full"
            name="name"
            value="{{$user->name}}"
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
            value="{{$user->last_names}}"
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
            value="{{$user->phone_number}}"
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
            value="{{$user->legal_id}}"
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
        <select disabled id="county" name="address_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <option selected value={{$user->address->id}}>{{$user->address->name}}</option>
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
            value="{{$user->email}}"
        />
        <!-- Error Example -->
        @error('email')
        <p class="text-red-500 text-xs mt-1">{{$message}}</p>
        @enderror
    
    </div>

    <div class="mb-6">
        <label for="profile_photo" class="inline-block text-lg mb-2">
            Profile photo
        </label>
        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" name="profile_photo" type="file" />

        @error('profile_photo')
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
            Edit
        </button>
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

            $('#county').removeAttr('disabled');

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

