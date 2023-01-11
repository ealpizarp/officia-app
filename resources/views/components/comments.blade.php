@props(['reviews'])

<x-card class="mt-20">

    
    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="font-bold leading-tight text-gray-700 text-2xl mt-0 mb-4">Users comments</h4>
                        @foreach ($reviews as $review)
                            <div class="display-comment">
                                <strong class='mt-2 mb-1 text-teal-600'>{{ $review->user->name }}</strong>
                                <p class='mb-2 text-gray-700'>{{ $review->body }}</p>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

</x-card>