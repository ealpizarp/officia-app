<!-- Code block starts -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<dh-component>

    <div class="py-12 bg-gray-700/50 transition duration-150 ease-in-out z-10 fixed top-0 right-0 bottom-0 left-0 h-auto w-screen hidden"
        id="review-modal">

        <div role="alert" class="container mx-auto w-11/12 md:w-2/3 max-w-lg">
            <div class="relative mt-5 py-8 px-5 md:px-10 bg-white shadow-md rounded-lg border border-gray-400">
                <form method="POST" action="/reviews" enctype="multipart/form-data" class="w-full h-full">
                    @csrf
                    <h1 class="text-gray-800 text-center text-2xl font-bold tracking-normal leading-tight mb-4">Tell us
                        about
                        your
                        experience!</h1>

                    <div class="rating py-10 flex items-center justify-center">

                        <svg aria-hidden="true" data-rating="5" class="s1 star w-10 h-10 text-gray-300"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <title>Five stars</title>
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>

                        <svg aria-hidden="true" data-rating="4" class="s2 star w-10 h-10 text-gray-300 "
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <title>Four stars</title>
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>

                        <svg aria-hidden="true" data-rating="3" class="s3 star w-10 h-10 text-gray-300"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <title>Three stars</title>
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>

                        <svg aria-hidden="true" data-rating="2" class="s4 star w-10 h-10 text-gray-300"
                            fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <title>Two stars</title>
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>

                        <svg aria-hidden="true" data-rating="1"
                            class="s5 star w-10 h-10 text-gray-300 dark:text-gray-500" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <title>One star</title>
                            <path
                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                            </path>
                        </svg>

                    </div>

                    @auth
                        <input name="user_id" class="hidden" type="text" value="{{ Auth::user()->id }}">

                        <input name="service_id" class="hidden" type="text"
                            value="{{ request()->route('listing')->id }}">
                    @endauth

                    <input id="stars_input" name="num_stars" class="hidden" type="text">



                    <label for="body" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your
                        message</label>
                    <textarea name="body" id="message" rows="4"
                        class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Write your thoughts here..."></textarea>



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
            class="focus:outline-none transition duration-150 ease-in-out py-2.5 px-5 mr-2 mb-2 text-sm font-medium text-gray-900  bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"
            onclick="modalHandler(true)">Write a review</button>
    </div>
    <script>
        let review_modal = document.getElementById("review-modal");

        function modalHandler(val) {
            if (val) {
                fadeIn(review_modal);
            } else {
                fadeOut(review_modal);
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

    <style>
        .rating {
            direction: rtl
        }

        .rating svg:hover,
        .selected {
            color: gold
        }


        .s1:hover~svg,
        .selected~svg {
            color: gold;
        }

        .s2:hover~svg,
        .selected~svg {
            color: gold;
        }

        .s3:hover~svg,
        .selected~svg {
            color: gold;
        }

        .s4:hover~svg,
        .selected~svg {
            color: gold;
        }

        .s5:hover~svg,
        .selected~svg {
            color: gold;
        }
    </style>


</dh-component>
