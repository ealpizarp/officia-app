<?php

namespace App\Http\Controllers;

use App\Models\Reviews;
use Illuminate\Http\Request;
use App\Models\Service;
use Illuminate\Validation\Rule;
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


        $review = Reviews::where('service_id', '=', $formFields['service_id'])
                            ->where('user_id', '=', $formFields['user_id'])
                            ->first();
        if ($review === null) {
            Reviews::create($formFields);
        }else{
            //dd($review);
            $review->body=$formFields['body'];
            $review->num_stars=intval($formFields['num_stars']);
            //dd($review); 
            $review->update($formFields);
        }

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
