@extends('admin_layout')

@section('content')
    <x-back-button></x-back-button>

    <meta name="_token" content="{{ csrf_token() }}">
    </meta>

    <form id="create-service" method="POST" action="/listings" enctype="multipart/form-data">
        @csrf

        <div class="flex flex-col">
            <header class="text-center">
                <h2 class="text-2xl text-center font-bold uppercase mb-1">
                    Publish your service
                </h2>
            </header>

            <div class="flex flex-col xl:flex-row ">

                <x-card class="p-10 max-w-lg mx-auto mt-24">

                    <div class="text-center font-bold uppercase mb-10">
                        <h2 class="text-lg text-gray-500">Add your service info</h2>
                    </div>


                    <div class="mb-6">
                        <label for="name" class="inline-block text-lg mb-2">Service title</label>
                        <input type="text" name="name" class="border border-gray-200 rounded p-2 w-full"
                            value="{{ old('name') }}" />

                        @error('name')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="mb-6">
                        <label for="category_id" class="inline-block text-lg mb-2">
                            Category
                        </label>
                        <select id="category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option>Select category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">

                        <label for="subcategory_id" class="inline-block text-lg mb-2">
                            Subcategory
                        </label>
                        <select id="subcategory" name="subcategory_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option>Select subcategory</option>
                        </select>
                        @error('subcategory_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="description" class="inline-block text-lg mb-2">Description</label>

                        <textarea id="description" name="description" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Describe your service here"></textarea>

                        @error('description')
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
                        <select id="county" name="address_id"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option>Select county</option>
                        </select>
                        @error('address_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="locations_directions" class="inline-block text-lg mb-2">Business directions</label>
                        <input name="locations_directions" type="text" class="border border-gray-200 rounded p-2 w-full"
                            value="{{ old('locations_directions') }}" />

                        @error('locations_directions')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror

                    </div>


                    <div class="mb-6">
                        <input name="user_id" type="text" id="user" placeholder="{{ Auth::user()->name }}"
                            aria-label="disabled input"
                            class=" hidden mb-6 bg-gray-100 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 cursor-not-allowed dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            value="{{ Auth::user()->id }}">
                        @error('user_id')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label for="reasons_to_choose" class="inline-block text-lg mb-2">Reasons to choose</label>

                        <textarea id="reasons_to_choose" name="reasons_to_choose" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Describe your service here"></textarea>

                        @error('reasons_to_choose')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input name="warranty" type="checkbox" value="1" class="sr-only peer" checked>
                            <div
                                class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Warranty</span>
                            @error('warranty')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </label>
                    </div>

                    <div class="mb-6">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input id="free_diagnosis" name="free_diagnosis" type="checkbox" value="1"
                                class="sr-only peer" onchange="checkboxState()" checked>
                            <div
                                class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Free diagnosis</span>
                            @error('free_diagnosis')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </label>
                    </div>



                    {{-- 
            <div class="mb-6">
                <label for="image" class="inline-block text-lg mb-2">
                    Cover image
                </label>
                <div class="flex items-center justify-center w-full">
                    <label for="dropzone-file" class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path></svg>
                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to upload</span> or drag and drop</p>
                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG or JPG (Max 5MB)</p>
                        </div>
                        <input id="dropzone-file" type="file" class="hidden" multiple />
                    </label>
                </div> 
                @error('image')
                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                @enderror
            </div> --}}


                </x-card>

                <!-- component -->
                <div class="flex w-1/2 bg-white h-screen sm:px-8 md:px-16 mt-24 font-bold uppercase">

                    <main class="container mx-auto max-w-screen-lg h-full">
                        <!-- file upload modal -->
                        <div aria-label="File Upload Modal"
                            class="relative h-full flex flex-col bg-white shadow-xl rounded-md"
                            ondrop="dropHandler(event);" ondragover="dragOverHandler(event);"
                            ondragleave="dragLeaveHandler(event);" ondragenter="dragEnterHandler(event);">
                            <div class="flex items-center mx-auto mt-10">
                                <h2 class="text-lg text-gray-500">Upload your service images</h2>
                            </div>
                            <!-- overlay -->
                            {{-- <div id="overlay"
                                class="w-full h-full absolute top-0 left-0 pointer-events-none z-50 flex flex-col items-center justify-center rounded-md">
                                <i>
                                    <svg class="fill-current w-12 h-12 mb-3 text-blue-700"
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24">
                                        <path
                                            d="M19.479 10.092c-.212-3.951-3.473-7.092-7.479-7.092-4.005 0-7.267 3.141-7.479 7.092-2.57.463-4.521 2.706-4.521 5.408 0 3.037 2.463 5.5 5.5 5.5h13c3.037 0 5.5-2.463 5.5-5.5 0-2.702-1.951-4.945-4.521-5.408zm-7.479-1.092l4 4h-3v4h-2v-4h-3l4-4z" />
                                    </svg>
                                </i>
                                <p class="text-lg text-blue-700">Drop files to upload</p>
                            </div> --}}

                            <!-- scroll area -->
                            <section class="h-full overflow-auto p-8 w-full h-full flex flex-col">
                                <header class="py-12 flex flex-col justify-center items-center">
                                    <button id="button" for="hidden-input"
                                        class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                        <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                            <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                                stroke="currentColor" viewBox="0 0 24 24"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                                </path>
                                            </svg>
                                            <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                                    class="font-semibold">Click to upload</span> or drag and drop</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG or JPG (Max 5MB)
                                            </p>
                                        </div>
                                        <input name="images[]" id="hidden-input" type="file" multiple
                                            class="hidden" />
                                    </button>
                                </header>

                                <h1 class="pt-8 pb-3 font-bold sm:text-lg text-gray-500">
                                    To Upload
                                </h1>

                                <ul id="gallery" class="flex flex-1 flex-wrap -m-1">
                                    <li id="empty"
                                        class="h-full w-full text-center flex flex-col items-center justify-center items-center">
                                        <img class="mx-auto w-32"
                                            src="https://user-images.githubusercontent.com/507615/54591670-ac0a0180-4a65-11e9-846c-e55ffce0fe7b.png"
                                            alt="no data" />
                                        <span class="text-small text-gray-500">No files selected</span>
                                    </li>
                                </ul>
                            </section>

                            <!-- sticky footer -->
                            {{-- <footer class="flex justify-end px-8 pb-8 pt-4">
                <button id="submit" class="bg-cyan-700 text-white rounded py-2 px-4 hover:bg-cyan-600 transition duration-300">
                    Publish service
                </button>
          <button id="cancel" class="ml-3 rounded-sm px-3 py-1 hover:bg-gray-300 focus:shadow-outline focus:outline-none">
            Cancel
          </button>
        </footer> --}}
                        </div>
                    </main>
                </div>

                <div class="mb-6">

                </div>

            </div>

            <div class="flex justify-center">
                <button id="submit"
                    class="bg-cyan-700 mt-10 text-center text-white w-48 rounded py-2 px-4 hover:bg-cyan-600 transition duration-300">
                    Publish service
                </button>
            </div>

        </div>

    </form>

    <!-- using two similar templates for simplicity in js code -->
    <template id="file-template">
        <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24">
            <article tabindex="0"
                class="group w-full h-full rounded-md focus:outline-none focus:shadow-outline elative bg-gray-100 cursor-pointer relative shadow-sm">
                <img alt="upload preview"
                    class="img-preview hidden w-full h-full sticky object-cover rounded-md bg-fixed" />

                <section class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                    <h1 class="flex-1 group-hover:text-blue-800"></h1>
                    <div class="flex">
                        <span class="p-1 text-blue-800">
                            <i>
                                <svg class="fill-current w-4 h-4 ml-auto pt-1" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24">
                                    <path d="M15 2v5h5v15h-16v-20h11zm1-2h-14v24h20v-18l-6-6z" />
                                </svg>
                            </i>
                        </span>
                        <p class="p-1 size text-xs text-gray-700"></p>
                        <button class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md text-gray-800">
                            <svg class="pointer-events-none fill-current w-4 h-4 ml-auto"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path class="pointer-events-none"
                                    d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                            </svg>
                        </button>
                    </div>
                </section>
            </article>
        </li>
    </template>

    <template id="image-template">
        <li class="block p-1 w-1/2 sm:w-1/3 md:w-1/4 lg:w-1/6 xl:w-1/8 h-24">
            <article tabindex="0"
                class="group hasImage w-full h-full rounded-md focus:outline-none focus:shadow-outline bg-gray-100 cursor-pointer relative text-transparent hover:text-white shadow-sm">
                <img alt="upload preview" class="img-preview w-full h-full sticky object-cover rounded-md bg-fixed" />

                <section class="flex flex-col rounded-md text-xs break-words w-full h-full z-20 absolute top-0 py-2 px-3">
                    <h1 class="flex-1"></h1>
                    <div class="flex">
                        <span class="p-1">
                            <i>
                                <svg class="fill-current w-4 h-4 ml-auto pt-" xmlns="http://www.w3.org/2000/svg"
                                    width="24" height="24" viewBox="0 0 24 24">
                                    <path
                                        d="M5 8.5c0-.828.672-1.5 1.5-1.5s1.5.672 1.5 1.5c0 .829-.672 1.5-1.5 1.5s-1.5-.671-1.5-1.5zm9 .5l-2.519 4-2.481-1.96-4 5.96h14l-5-8zm8-4v14h-20v-14h20zm2-2h-24v18h24v-18z" />
                                </svg>
                            </i>
                        </span>

                        <p class="p-1 size text-xs"></p>
                        <button class="delete ml-auto focus:outline-none hover:bg-gray-300 p-1 rounded-md">
                            <svg class="pointer-events-none fill-current w-4 h-4 ml-auto"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <path class="pointer-events-none"
                                    d="M3 6l3 18h12l3-18h-18zm19-4v2h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711z" />
                            </svg>
                        </button>
                    </div>
                </section>
            </article>
        </li>
    </template>

    <script>
        const fileTempl = document.getElementById("file-template"),
            imageTempl = document.getElementById("image-template"),
            empty = document.getElementById("empty");

        // use to store pre selected files
        let FILES = {};

        // check if file is of type image and prepend the initialied
        // template to the target element

        document.getElementById("submit").onclick = () => {

            const dt = new DataTransfer()
            const files = Object.values(FILES)

            for (let i = 0; i < files.length; i++) {
                console.log(files[i])
                dt.items.add(files[i])
                console.log(dt)
                // console.log(dt.items) 
            }

            document.getElementById("hidden-input").files = dt.files
        };

        function addFile(target, file) {
            // console.log(document.getElementById("hidden-input").files)
            const isImage = file.type.match("image.*"),
                objectURL = URL.createObjectURL(file);

            const clone = isImage ?
                imageTempl.content.cloneNode(true) :
                fileTempl.content.cloneNode(true);

            clone.querySelector("h1").textContent = file.name;
            clone.querySelector("li").id = objectURL;
            clone.querySelector(".delete").dataset.target = objectURL;
            clone.querySelector(".size").textContent =
                file.size > 1024 ?
                file.size > 1048576 ?
                Math.round(file.size / 1048576) + "mb" :
                Math.round(file.size / 1024) + "kb" :
                file.size + "b";

            isImage &&
                Object.assign(clone.querySelector("img"), {
                    src: objectURL,
                    alt: file.name
                });

            empty.classList.add("hidden");
            target.prepend(clone);

            FILES[objectURL] = file;
        }

        const gallery = document.getElementById("gallery"),
            overlay = document.getElementById("overlay");

        // click the hidden input of type file if the visible button is clicked
        // and capture the selected files
        const hidden = document.getElementById("hidden-input");
        document.getElementById("button").onclick = () => hidden.click();
        hidden.onchange = (e) => {

            if (verifyMaxFiles(e, FILES)) {
                alert('Cannot add more than 6 photos per service')
            } else {
                for (const file of e.target.files) {

                    if (verifyMaxSize(file)) {
                        alert('Images must be 5mb or less')
                    } else {
                        addFile(gallery, file);
                    }

                }
            }
        };

        let form = document.querySelector('#create-service');
        form.addEventListener('submit', function(event) {

            // Ignore the #toggle-something button
            if (event.submitter.matches('#button')) {
                event.preventDefault();
            }

        });

        function verifyMaxFiles(event, filesDict) {
            return (event.target.files.length > 6 || Object.keys(filesDict).length + event.target.files.length > 6)
        }

        function verifyMaxSize(file) {
            return (file.size > 5242880)
        }

        // use to check if a file is being dragged
        const hasFiles = ({
                dataTransfer: {
                    types = []
                }
            }) =>
            types.indexOf("Files") > -1;

        // use to drag dragenter and dragleave events.
        // this is to know if the outermost parent is dragged over
        // without issues due to drag events on its children
        let counter = 0;

        // reset counter and append file to gallery when file is dropped
        function dropHandler(ev) {
            ev.preventDefault();
            for (const file of ev.dataTransfer.files) {
                addFile(gallery, file);
                overlay.classList.remove("draggedover");
                counter = 0;
            }
        }

        // only react to actual files being dragged
        function dragEnterHandler(e) {
            e.preventDefault();
            if (!hasFiles(e)) {
                return;
            }
            ++counter && overlay.classList.add("draggedover");
        }

        function dragLeaveHandler(e) {
            1 > --counter && overlay.classList.remove("draggedover");
        }

        function dragOverHandler(e) {
            if (hasFiles(e)) {
                e.preventDefault();
            }
        }

        // event delegation to caputre delete events
        // fron the waste buckets in the file preview cards
        gallery.onclick = ({
            target
        }) => {
            if (target.classList.contains("delete")) {
                const ou = target.dataset.target;
                document.getElementById(ou).remove(ou);
                gallery.children.length === 1 && empty.classList.remove("hidden");
                delete FILES[ou];
            }
        };

        // clear entire selection
        // document.getElementById("cancel").onclick = () => {
        //     while (gallery.children.length > 0) {
        //         gallery.lastChild.remove();
        //     }
        //     FILES = {};
        //     empty.classList.remove("hidden");
        //     gallery.append(empty);
        // };
    </script>
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

    });


    $(document).ready(function() {
        $("#category").change(function() {
            var category_id = $(this).val();

            if (category_id == "") {
                var category_id = 0;
            }

            $.ajax({
                url: '{{ url('/subcategories/') }}/' + category_id,
                type: 'get',
                dataType: 'json',
                success: function(response) {
                    console.log(response);
                    $('#subcategory').find('option:not(:first)').remove();

                    if (response['subcategories'].length > 0) {
                        $.each(response['subcategories'], function(key, value) {
                            $("#subcategory").append("<option value='" + value[
                                'id'] + "'>" + value['name'] + "</option>")
                        });
                    }
                }
            });
        });

    });
</script>
