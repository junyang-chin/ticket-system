<?php

namespace App\Http\Controllers;

use App\Models\TrackingPriority;
use App\Http\Requests\StoreTrackingPriorityRequest;
use App\Http\Requests\UpdateTrackingPriorityRequest;

class TrackingPriorityController extends Controller
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
     * @param  \App\Http\Requests\StoreTrackingPriorityRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTrackingPriorityRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TrackingPriority  $trackingPriority
     * @return \Illuminate\Http\Response
     */
    public function show(TrackingPriority $trackingPriority)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TrackingPriority  $trackingPriority
     * @return \Illuminate\Http\Response
     */
    public function edit(TrackingPriority $trackingPriority)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTrackingPriorityRequest  $request
     * @param  \App\Models\TrackingPriority  $trackingPriority
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTrackingPriorityRequest $request, TrackingPriority $trackingPriority)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TrackingPriority  $trackingPriority
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrackingPriority $trackingPriority)
    {
        //
    }
}
