<!-- Code block starts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<dh-component>

    <div class="py-12 bg-gray-700/50 transition duration-150 ease-in-out z-10 fixed top-0 right-0 bottom-0 left-0 h-auto w-screen hidden"
        id="report-modal">

        <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
            <div class="relative mt-5 py-8 px-5 md:px-10 bg-white shadow-md rounded-lg border border-gray-400 dark:bg-gray-800">
                <form method="POST" action="/users/verify/{{ Auth::user()->id }}" enctype="multipart/form-data"
                    class="w-full h-full">
                    @csrf
                    @method('PUT')
                    <h1 class="text-gray-500 text-center text-2xl font-bold tracking-normal leading-tight mb-4 dark:text-gray-200">
                        Get verified now!</h1>

                    <div class="py-10 flex flex-col items-center justify-center">
                        <label for="verification_photo" class="font-bold text-gray-600 inline-block text-lg mb-2 dark:text-gray-200">
                            Upload an image of your ID
                        </label>
                        <div class="flex items-center justify-center mt-5 w-full">
                            <label for="dropzone-file"
                                class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                                <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                    <svg aria-hidden="true" class="w-10 h-10 mb-3 text-gray-400" fill="none"
                                        stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12">
                                        </path>
                                    </svg>
                                    <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span
                                            class="font-semibold">Click to
                                            upload</span> or drag and drop</p>
                                    <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG (MAX. 800x400px)
                                    </p>
                                </div>
                                <input name="verification_photo" id="dropzone-file" type="file" class="hidden" />
                            </label>
                        </div>
                        @error('verification_photo')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>


                    <div class="flex items-center justify-center w-full py-5 mt-5">
                        <button
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit
                        </button>
                    </div>
                </form>


                {{-- <button
                id="cancel-button"
                class="py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
                onclick="modalHandler()">Cancel</button> --}}

                <button
                    class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:ring-2 focus:outline-none focus:ring-gray-600"
                    onclick="modalHandler()" aria-label="close modal" role="button">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-x" width="20"
                        height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
        </div>

    </div>
    <div class="w-full flex justify-center py-12" id="button">
        <button
            class="focus:outline-none transition duration-150 ease-in-out py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900 bg-lime-500 rounded-lg border border-gray-200 hover:bg-lime-400 hover:text-blue-700 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
            onclick="modalHandler(true)"><span class="pr-2"><i class="fa-solid fa-certificate"></i></span>Get
            Verified</button>
    </div>
    <script>
        let report_modal = document.getElementById("report-modal");

        function modalHandler(val) {
            if (val) {
                fadeIn(report_modal);
            } else {
                fadeOut(report_modal);
            }
        }

        function fadeOut(el) {
            el.style.opacity = 1;
            (function fade() {
                if ((el.style.opacity -= 0.1) < 0) {
                    el.style.display = "none";
                } else {
                    requestAnimationFrame(fade);
                }
            })();
        }

        function fadeIn(el, display) {
            el.style.opacity = 0;
            el.style.display = display || "flex";
            (function fade() {
                let val = parseFloat(el.style.opacity);
                if (!((val += 0.2) > 1)) {
                    el.style.opacity = val;
                    requestAnimationFrame(fade);
                }
            })();
        }
    </script>


</dh-component>
