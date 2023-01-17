@extends('admin_layout')

@section('content')

<x-back-button></x-back-button>

<meta name="_token" content="{{csrf_token()}}"></meta>

<x-card class="p-3 md:p-10 mx-4 md:mx-auto mt-0 md:mt-24">
    <header class="text-center">
        <h2 class="hidden md:block text-2xl font-bold uppercase mb-1 dark:text-gray-200">
            Edit your service
        </h2>
    </header>

    <form method="POST" action="/listings/{{$listing->id}}" enctype="multipart/form-data">
        @csrf
        @method("PUT")
        <div class="mb-6">
            <label for="name" class="inline-block text-lg mb-2 dark:text-gray-200">Service title</label>
            <input type="text" name="name" class="border border-gray-200 rounded p-2 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
                value="{{ $listing->name }}" />

            @error('name')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-6">
            <label for="category_id" class="inline-block text-lg mb-2 dark:text-gray-200">
                Category
            </label>
            <select id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Select category</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"> 
                        {{ $category->name }} 
                    </option>
                @endforeach    
            </select>
            @error('category_id')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            
            <label for="subcategory_id" class="inline-block text-lg mb-2 dark:text-gray-200">
                Subcategory
            </label>
            <select id="subcategory" name="subcategory_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                <option selected value="{{$listing->subcategory->id}}"> {{$listing->subcategory->name}} </option>
            </select>
            @error('subcategory_id')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="description" class="inline-block text-lg mb-2 dark:text-gray-200">Description</label>

            <textarea id="description" 
            name="description" 
            rows="4" 
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" 
            >{{$listing->description}}</textarea>

            @error('description')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>


        <div class="mb-6">
            <label for="province_id" class="inline-block text-lg mb-2 dark:text-gray-200">
                Province
            </label>
            <select id="province" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected>Select province</option>
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
            
            <label for="address_id" class="inline-block text-lg mb-2 dark:text-gray-200">
                County
            </label>
            <select id="county" disabled name="address_id" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option selected value="{{$listing->address->id}}"> {{$listing->address->name}} </option>
            </select>
            @error('address_id')
            <p class="text-red-500 text-xs mt-1">{{$message}}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="locations_directions" class="inline-block text-lg mb-2 dark:text-gray-200">Buisness directions</label>
            <input name="locations_directions" type="text" class="border border-gray-200 rounded p-2 w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                value="{{$listing->locations_directions}}" />

            @error('locations_directions')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror

        </div>

        <div class="mb-6">
            <label for="reasons_to_choose" class="inline-block text-lg mb-2 dark:text-gray-200">Reasons to choose</label>

            <textarea id="reasons_to_choose" 
            name="reasons_to_choose" 
            rows="4" 
            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
            >{{$listing->reasons_to_choose}}</textarea>

            @error('reasons_to_choose')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label class="relative inline-flex items-center cursor-pointer">
                <input name="warranty" type="checkbox" value="1" class="sr-only peer"
                @if($listing->warranty == 1)
                checked
                @endif
                >
                <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Warranty</span>
                @error('warranty')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </label>
        </div>

        <div class="mb-6">
            <label class="relative inline-flex items-center cursor-pointer">
                <input id="free_diagnosis" name="free_diagnosis" type="checkbox" value="1" class="sr-only peer"
                @if($listing->free_diagnosis == 1)
                checked
                @endif
                >
                <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Free diagnosis</span>
                @error('free_diagnosis')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </label>
        </div>




        <div class="mb-6">
            <label for="image" class="inline-block text-lg mb-2">
                Cover image
            </label>
            <div class="flex items-center justify-center w-full">
                <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG or GIF (MAX. 800x400px)</p>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden" />
                </label>
            </div> 
            @error('image')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>



        <div class="mb-6">
            <button class="bg-cyan-700 text-white rounded py-2 px-4 hover:bg-cyan-600 transition duration-300">
                Edit service
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


   $(document).ready(function(){
        $("#category").change(function(){
            var category_id = $(this).val();

            if (category_id == "") {
                var category_id = 0;
            }

            $('#subcategory').removeAttr('disabled');

            $.ajax({
                url: '{{ url("/subcategories/") }}/'+category_id,
                type: 'get',
                dataType: 'json',
                success: function(response) {             
                    console.log(response);
                    $('#subcategory').find('option:not(:first)').remove();

                    if (response['subcategories'].length > 0) {
                        $.each(response['subcategories'], function(key,value){
                            $("#subcategory").append("<option value='"+value['id']+"'>"+value['name']+"</option>")
                        });
                    } 
                }
            });            
        });

   });

</script>