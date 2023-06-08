<?php

namespace App\Http\Controllers;

use App\Models\Juara;
use App\Http\Requests\StoreJuaraRequest;
use App\Http\Requests\UpdateJuaraRequest;

class JuaraController extends Controller
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
     * @param  \App\Http\Requests\StoreJuaraRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJuaraRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Juara  $juara
     * @return \Illuminate\Http\Response
     */
    public function show(Juara $juara)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Juara  $juara
     * @return \Illuminate\Http\Response
     */
    public function edit(Juara $juara)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJuaraRequest  $request
     * @param  \App\Models\Juara  $juara
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJuaraRequest $request, Juara $juara)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Juara  $juara
     * @return \Illuminate\Http\Response
     */
    public function destroy(Juara $juara)
    {
        //
    }
}
