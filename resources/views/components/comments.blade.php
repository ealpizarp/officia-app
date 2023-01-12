@props(['reviews'])

<x-card class="mt-20 bg-gray-100 mx-5 shadow-lg">
 

    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="font-bold leading-tight text-gray-700 text-2xl mt-0 mb-4">User reviews</h4>
                        @foreach ($reviews as $review)
        
                            <article class="py-5">
                                <div class="flex items-center mb-4 space-x-4">
                                    <img class="w-10 h-10 rounded-full" src="https://placeimg.com/192/192/people"
                                        alt="">
                                    <div class="space-y-1 font-medium dark:text-white">
                                        <p>{{$review->user->name}} {{$review->user->last_names}}<time datetime="2014-08-16 19:00"
                                                class="block text-sm text-gray-500 dark:text-gray-400">Joined on
                                                {{ date('F, Y', strtotime($review->user->created_at)) }} </time></p>
                                    </div>
                                </div>
                                <div class="flex items-center mb-1">
                                    <div class="stars-review flex">
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-300 @if($review->num_stars==5) selected @endif" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <title>Five stars</title>
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-300 @if($review->num_stars==4) selected @endif" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <title>Four stars</title>
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-300 @if($review->num_stars==3) selected @endif" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <title>Three star</title>
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-300 @if($review->num_stars==2) selected @endif" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <title>Two star</title>
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                        <svg aria-hidden="true" class="w-5 h-5 text-gray-300 @if($review->num_stars==1) selected @endif" fill="currentColor"
                                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                            <title>One star</title>
                                            <path
                                                d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                            </path>
                                        </svg>
                                    </div>
                                    <h3 class="ml-2 text-sm font-semibold text-gray-900 dark:text-white">{{$review->num_stars}} stars</h3>
                                </div>
                                <footer class="mb-5 text-sm text-gray-500 dark:text-gray-400">
                                    <p>Reviewed on <time
                                            datetime="{{ $review->created_at }}">{{ date('F, Y h:i A', strtotime($review->created_at)) }}</time>
                                    </p>
                                </footer>
                                <p class="mb-2 text-gray-700 dark:text-gray-400">{{ $review->body }}
                                </p>
                                {{-- <a href="#"
                                    class="block mb-5 text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">Read
                                    more</a> --}}
                                <aside>
                                    {{-- <p class="mt-1 text-xs text-gray-500 dark:text-gray-400">19 people found this
                                        helpful</p> --}}
                                    {{-- <div
                                        class="flex items-center mt-4 space-x-3 divide-x divide-gray-200 dark:divide-gray-600">
                                        <a href="#"
                                            class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-xs px-2 py-1.5 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Helpful</a>
                                        <a href="#"
                                            class="pl-4 text-sm font-medium text-blue-600 hover:underline dark:text-blue-500">Report
                                            abuse</a>
                                    </div> --}}
                                </aside>
                            </article>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-card>


<style>
    .stars-review {
        direction: rtl
    }
    .selected {
        color: gold
    }

    .selected~svg {
        color: gold;
    }
</style>
