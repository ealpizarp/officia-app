@props(['comment','listing'])

<x-card class="mt-20">
    
    <div class="container">
        <div class="row justify-content-center mt-2">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h4 class="font-bold leading-tight text-gray-700 text-2xl mt-0 mb-4">Users comments</h4>
                        @foreach ($listing->comments as $comment)
                            <div class="display-comment">
                                <strong class='mt-2 mb-1 text-teal-600'>{{ $comment->user->name }}</strong>
                                <p class='mb-2 text-gray-700'>{{ $comment->body }}</p>
                            </div>
                        @endforeach

                    </div>
                    <form class="bg-white shadow-md rounded px-2 pt-6 pb-8 mb-4 py-5 border-slate-400 w-auto" method="post"
                    action="{{ route('comment.add') }}">
                    @csrf
                    <div class="form-group border-slate-400">
                        <input type="text" name="comment_body"
                            class="form-control w-full bg-gray-100 rounded h-10" />
                        <input type="hidden" name="listing_id" value="{{ $listing->id }}" />
                    </div>
                    <div class="form-group">
                        <input type="submit"
                            class="bg-cyan-700 hover:bg-cyan-600 text-white font-bold py-2 px-4 mt-5 rounded"
                            value="Add Comment" />
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>

</x-card>