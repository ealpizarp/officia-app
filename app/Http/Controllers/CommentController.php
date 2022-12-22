<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Listing;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $comment = new Comment;
        $comment->body = $request->get('comment_body');
        $comment->user()->associate($request->user());
        $listing = Listing::find($request->get('listing_id'));
        $listing->comments()->save($comment);

        return back()->with('message', 'Comment added succesfully');
    }
}
