<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = Service::with(['address','user','subcategory'])->get();

        return view('listings.services_index',['service' => $services]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('listings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //"name",'description','free_diagnosis','reasons_to_choose','locations_directions','address_id','subcategory_id','user_id'

        $formFields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'reasons_to_choose' => 'required',
            'locations_directions' => 'required',
            'address_id' => 'required',
            'subcategory_id' => 'required',
            'user_id' => 'required'
        ]);

        if (!$request->free_diagnosis) {
            $formFields['free_diagnosis'] = 0;
        }
        

        Service::create($formFields);

        return redirect()->route("/user")->with(["mensaje" => "Service published succesfully!"]);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        //
        return view("service.edit", ["service" => $service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        //
        $formFields = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'free_diagnosis' => 'required',
            'reasons_to_choose' => 'required',
            'locations_directions' => 'required',
            'address_id' => 'required',
            'subcategory_id' => 'required',
            'user_id' => 'required'
        ]);

        $service->update($formFields);

        return back()->with(["mensaje" => "Ad updated succesfully!!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        //
        $service->delete();
        return redirect()->route('/dashboard')->with(["mensaje" => "Ad deleted succesfully!!"]);
    }
}
