<?php

namespace App\Http\Controllers;

use App\Models\OfficeMaster;
use Illuminate\Http\Request;

class OfficeMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $officemaster = OfficeMaster::all();
        return $officemaster;

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
     * @param  \App\Models\OfficeMaster  $officeMaster
     * @return \Illuminate\Http\Response
     */
    public function show(OfficeMaster $officeMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\OfficeMaster  $officeMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, OfficeMaster $officeMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\OfficeMaster  $officeMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(OfficeMaster $officeMaster)
    {
        //
    }
}
