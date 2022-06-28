<?php

namespace App\Http\Controllers;

use App\Personality;
use App\PersonalityTypes;
use App\PersonalityInsights;

use Illuminate\Http\Request;

class PersonalityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return PersonalityInsights::find(1);
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
     * @param  \App\Personality  $personality
     * @return \Illuminate\Http\Response
     */
    public function show(PersonalityTypes $personality)
    {
        $response = ['state' => 1, 'personality' => $personality->insight];
        return json_encode($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personality  $personality
     * @return \Illuminate\Http\Response
     */
    public function edit(Personality $personality)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personality  $personality
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personality $personality)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personality  $personality
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personality $personality)
    {
        //
    }
}
