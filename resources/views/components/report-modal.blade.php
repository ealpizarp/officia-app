@props(['listing'])
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<dh-component>

    <div class="py-12 bg-gray-700/50 transition duration-150 ease-in-out z-10 fixed top-0 right-0 bottom-0 left-0 h-auto w-screen hidden"
        id="modal">

        <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
            <div class="relative mt-5 py-8 px-5 md:px-10 bg-white shadow-md rounded-lg border border-gray-400">
                <form method="POST" action="/reports" enctype="multipart/form-data"
                    class="w-full h-full">
                    @csrf

                    <h1 class="text-gray-500 text-center text-2xl font-bold tracking-normal leading-tight mb-6">
                        Report this service</h1>

                    <div class="mb-6">
                        <label for="category_id" class="inline-block text-lg mb-2">
                            Category
                        </label>
                        <select name="category" id="category"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <option>Select category</option>
                            <option value="Spam"> Spam </option>
                            <option value="Sexual content"> Sexual content </option>
                            <option value="Copyright violation"> Copyright violation </option>
                            <option value="Violent content"> Violent content </option>

                        </select>
                    </div>

                    @auth
                        <input name="user_id" class="hidden" type="text" value="{{ Auth::user()->id }}">
                    @endauth

                    <input name="service_id" class="hidden" type="text" value="{{ $listing->id }}">



                    <div class="mb-6">
                        <label for="description" class="inline-block text-lg mb-2">Description</label>

                        <textarea id="description" name="description" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Describe your service here"></textarea>

                        @error('description')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>





                    <div class="flex items-center justify-center w-full py-5 mt-5">
                        <button
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Submit
                        </button>
                    </div>
                </form>

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

    <div class="flex mr-5 mt-2.5" id="button">
        <button
            class="focus:outline-none transition duration-150 ease-in-out py-2.5 px-5  text-sm font-medium text-gray-900 bg-gray-200 rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
            onclick="modalHandler(true)"><span class="pr-2"><i class="fa-solid fa-hand"></i></span>Report
            service</button>
    </div>
    <script>
        let modal = document.getElementById("modal");

        function modalHandler(val) {
            if (val) {
                fadeIn(modal);
            } else {
                fadeOut(modal);
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



        var $stars = $('.rating .star');

        let $input = $('#stars_input')

        $stars.each(function() {
            var $this = $(this);
            var rating = $this.data('rating');

            $this.on('click', function(e) {
                e.preventDefault();

                // Prevent from selecting multiple times, or in our case

                if ($this.hasClass('selected')) {
                    // alert('you\'ve already selected this, but thanks for trying again!'); --DEBUG--
                    return false;
                }


                $stars.removeClass('selected');
                $this.addClass('selected');

                // ADD AN AJAX CALL HERE!
                // $.ajax(...);

                // This is only a test so you can see it working
                $('#stars_input').val(rating)
                // alert('You selected a star rating of: ' + rating); --DEBUG--

            });
        });
    </script>


</dh-component>
