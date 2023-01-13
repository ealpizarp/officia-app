<?php

namespace App\Http\Controllers;

use App\Models\Subcategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = DB::table('service')
                            ->join('subcategory', 'subcategory.id', '=', 'service.subcategory_id')
                            ->select(DB::raw('count(service.name) as amount, subcategory.id, subcategory.name'))
                            ->groupBy(DB::raw('subcategory.id, subcategory.name'))
                            ->orderBy('amount', 'desc')
                            ->paginate(15);

        return view('subcategories.index', ['subcategories' => $subcategories]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }

    public function subcategoryByCategory(Request $request) 
    {
        $subcategories = Subcategory::where('category_id', '=', $request->id)->get();
        return response()->json([
            'status' => 1,
            'subcategories' => $subcategories
            ]
        );
    }
}
