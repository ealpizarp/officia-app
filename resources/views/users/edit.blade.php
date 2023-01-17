@extends('guest_layout')

@section('content')
    <x-card class="p-10 max-w-lg mx-auto mt-24">
        <header class="text-center">
            <h2 class="text-2xl font-bold uppercase mb-1">
                Edit User
            </h2>
        </header>
        <meta name="_token" content="{{ csrf_token() }}">
        </meta>

        <form method="POST" action="/users/{{ $user->id }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label for="name" class="inline-block text-lg mb-2">
                    Name
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="name"
                    value="{{ $user->name }}" />
                @error('name')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="last_names" class="inline-block text-lg mb-2">
                    Last name
                </label>
                <input type="text" class="border border-gray-200 rounded p-2 w-full" name="last_names"
                    value="{{ $user->last_names }}" />
                @error('last_names')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="phone_number" class="inline-block text-lg mb-2">
                    Phone number
                </label>
                <input type="number" class="border border-gray-200 rounded p-2 w-full" name="phone_number"
                    value="{{ $user->phone_number }}" />
                @error('phone_number')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="legal_id" class="inline-block text-lg mb-2">
                    Identification number
                </label>
                <input type="number" class="border border-gray-200 rounded p-2 w-full" name="legal_id"
                    value="{{ $user->legal_id }}" />
                @error('legal_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="province_id" class="inline-block text-lg mb-2">
                    Province
                </label>
                <select id="province"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option>Select province</option>
                    @foreach ($provinces as $province)
                        <option value="{{ $province->id }}">
                            {{ $province->name }}
                        </option>
                    @endforeach
                </select>
                @error('province_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">


                <label for="address_id" class="inline-block text-lg mb-2">
                    County
                </label>
                <select disabled id="county" name="address_id"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <option selected value={{ $user->address->id }}>{{ $user->address->name }}</option>
                </select>
                @error('address_id')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="email" class="inline-block text-lg mb-2">Email</label>
                <input type="email" class="border border-gray-200 rounded p-2 w-full" name="email"
                    value="{{ $user->email }}" />
                <!-- Error Example -->
                @error('email')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-6">
                <h1 class="text-lg mb-2 dark:text-gray-200">Profile picture
                </h1>
                <div class="avatar-upload">
                    <div class="avatar-edit">
                        <input name="profile_photo" class="text-highlight_blue" type='file' id="imageUpload"
                            accept=".png, .jpg, .jpeg" />
                        <label class="hover:text-gray-500 hover:border-gray-200" for="imageUpload"></label>
                    </div>
                    <div class="avatar-preview border-4 border-highlight_blue w-48 h-48 relative rounded-full shadow-xl">
                        <div id="imagePreview" class="z-10 w-full h-full bg-cover bg-no-repeat bg-center rounded-full "
                            style="background-image: url({{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('./images/profile_template.png') }})">
                        </div>

                    </div>

                </div>
                @error('profile_photo')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-6">
                <label for="password" class="inline-block text-lg mb-2">
                    Password
                </label>

                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password" />
                @error('password')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror


            </div>


            <div class="mb-6">
                <label for="password_confirmation" class="inline-block text-lg mb-2">
                    Confirm Password
                </label>
                <input type="password" class="border border-gray-200 rounded p-2 w-full" name="password_confirmation" />
                @error('password_confirmation')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror

            </div>

            <div class="mb-6">
                <button type="submit"
                    class="bg-cyan-700 text-white rounded py-2 px-4 hover:bg-cyan-600 transition duration-300">
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

    $(document).ready(function() {
        $("#province").change(function() {
            var province_id = $(this).val();

            if (province_id == "") {
                var province_id = 0;
            }

            $('#county').removeAttr('disabled');

            $.ajax({
                url: '{{ url('/address/') }}/' + province_id,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    $('#county').find('option:not(:first)').remove();

                    if (response['addresses'].length > 0) {
                        $.each(response['addresses'], function(key, value) {
                            $("#county").append("<option value='" + value['id'] +
                                "'>" + value['name'] + "</option>")
                        });
                    }
                }
            });
        });

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url(' + e.target.result + ')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });

    });
</script>

<style>

    .container {
        max-width: 960px;
        margin: 30px auto;
        padding: 20px;
    }


    .avatar-upload {
        position: relative;
        max-width: 205px;
        margin: 50px auto;
    }

    .avatar-upload .avatar-edit {
        position: absolute;
        right: 12px;
        z-index: 1;
        top: 10px;
    }

    .avatar-upload .avatar-edit input {
        display: none;
    }

    .avatar-upload .avatar-edit input+label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 100%;
        background: #FFFFFF;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }

    .avatar-upload .avatar-edit input+label:hover {
    }

    .avatar-upload .avatar-edit input+label:after {
        content: "\f040";
        font-family: 'FontAwesome';
        position: absolute;
        top: 6px;
        left: 0;
        right: 0;
        text-align: center;
        margin: auto;
    }



</style>