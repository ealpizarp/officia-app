<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Support\Facades\DB;

class ReviewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $formFields = $request->validate([
            'body' => 'required',
            'num_stars' => 'required',
            'service_id' => 'required',
            'user_id' => 'required'
        ]);


        Reviews::create($formFields);

        return back()->with('message', 'Review added succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Service $listing)
    {

        $reviews = Reviews::with(['service', 'user'])->where('service_id','=',$listing->id)->get();
        
        // DB::table('reviews')->select('num_stars')->avg('num_stars')->groupBy('num_stars')->where('service_id', $listing->id)->get();
        //DB::table('reviews')->count('num_stars')->where('service_id', $listing->id)->first();

        return view('listings.guest_show', [
            'reviews' => $reviews
        ]);
    }

    public function show_admin(Service $listing)
    {
        $reviews = Reviews::with(['service', 'user'])->where('service_id','=',$listing->id)->get();

        //$stars = DB::

        return view('listings.admin_show', ['reviews' => $reviews  ]);
    }

    public function show_user(Service $listing)
    {
        $reviews = Reviews::with(['service', 'user'])->where('service_id','=',$listing->id)->get();

        //$stars = DB::

        return view('listings.user_show', ['reviews' => $reviews ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Reviews $review)
    {
        $review->delete();
        return back()->with('message', 'Review deleted succesfully!');
    }
}
