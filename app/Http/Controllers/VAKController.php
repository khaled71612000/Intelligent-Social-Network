<?php

namespace App\Http\Controllers;

use App\{VAK, VAKType};
use Illuminate\Http\Request;

class VAKController extends Controller
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
     * @param  \App\VAK  $vAK
     * @return \Illuminate\Http\Response
     */
    public function show(VAK $vAK)
    {
        //
    }


    public function getInsights(VAKType $learning_style) {
        $response = ['state' => 1, 'insight' => $learning_style->insights];
        return json_encode($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\VAK  $vAK
     * @return \Illuminate\Http\Response
     */
    public function edit(VAK $vAK)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\VAK  $vAK
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VAK $vAK)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\VAK  $vAK
     * @return \Illuminate\Http\Response
     */
    public function destroy(VAK $vAK)
    {
        //
    }
}
