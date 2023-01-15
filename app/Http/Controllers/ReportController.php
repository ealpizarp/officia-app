<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Report;

class ReportController extends Controller
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

    public function admin() {
        $reports = Report::with(['user','service'])->paginate(15);

        return view('reports.index', [
            'reports' => $reports
        ]);
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
            'category' => 'required',
            'description' => 'required',
            'service_id' => 'required',
            'user_id' => 'required'             
        ]);

        $report = Report::where('service_id', '=', $formFields['service_id'])
                            ->where('user_id', '=', $formFields['user_id'])
                            ->first();

        if ($report === null) {
            Report::create($formFields);
        }else{
            //dd($review);
            $report->category=$formFields['category'];
            $report->description=$formFields['description'];
            //dd($review); 
            $report->update($formFields);
        }

        return back()->with('message', 'Reports sent succesfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        $actua_report = Report::with(['service','user'])->where('id','=',$report->id)->first();

        return view('reports.show', [
            'report' => $actua_report
        ]);
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
    public function destroy(Report $report)
    {
        $report->delete();
        return back()->with('message', 'Report deleted succesfully!');
    }
}
