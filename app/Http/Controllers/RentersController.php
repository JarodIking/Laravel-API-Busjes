<?php

namespace App\Http\Controllers;

use App\Models\renters;
use Illuminate\Http\Request;

class RentersController extends Controller
{
    /**
     * retrieve all renting companies
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(renters::all());
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
     * @param  \App\Models\renters  $renters
     * @return \Illuminate\Http\Response
     */
    public function show(renters $renters)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\renters  $renters
     * @return \Illuminate\Http\Response
     */
    public function edit(renters $renters)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\renters  $renters
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, renters $renters)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\renters  $renters
     * @return \Illuminate\Http\Response
     */
    public function destroy(renters $renters)
    {
        //
    }
}
