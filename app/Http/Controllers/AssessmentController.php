<?php

namespace App\Http\Controllers;

use App\assessment;
use Illuminate\Http\Request;

class AssessmentController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function show(assessment $assessment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function edit(assessment $assessment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, assessment $assessment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\assessment  $assessment
     * @return \Illuminate\Http\Response
     */
    public function destroy(assessment $assessment)
    {
        //
    }

    public function communicationSkill_create()
    {
        return view('/panelUser.communicationSkill_assessments');
    }
}
