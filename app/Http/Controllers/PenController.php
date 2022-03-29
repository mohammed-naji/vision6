<?php

namespace App\Http\Controllers;

use App\Models\Pen;
use App\Http\Requests\StorePenRequest;
use App\Http\Requests\UpdatePenRequest;

class PenController extends Controller
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
     * @param  \App\Http\Requests\StorePenRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePenRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pen  $pen
     * @return \Illuminate\Http\Response
     */
    public function show(Pen $pen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pen  $pen
     * @return \Illuminate\Http\Response
     */
    public function edit(Pen $pen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenRequest  $request
     * @param  \App\Models\Pen  $pen
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenRequest $request, Pen $pen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pen  $pen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pen $pen)
    {
        //
    }
}
