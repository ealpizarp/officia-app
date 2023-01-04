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

        //echo '<pre>';print_r($address);'</pre>';

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
        return view('services.create');
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

        $service = new Service($request->input());
        $service->saveOrFail();
        return redirect()->route("services.index")->with(["mensaje" => "¡Negocio publicado!"]);
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
        return view("services.services_edit", ["service" => $service]);
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
        $service->fill($request->input())->saveOrFail();
        return redirect()->route("services.index")->with(["mensaje" => "¡Negocio actualizado!"]);
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
        return redirect()->route("services.index")->with(["mensaje" => "¡Negocio eliminado!"]);
    }
}
