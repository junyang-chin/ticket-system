<?php

namespace App\Http\Controllers;

use App\Http\Resources\AssignmentResource;
use App\Http\Resources\TicketResource;
use App\Http\Resources\UserResource;
use App\Http\Services\AssignmentService;
use App\Models\Assignment;
use App\Models\Ticket;
use Illuminate\Http\Request;

class AssignmentController extends Controller
{
    protected $assignmentService;

    /**
     * Instanstiate a new controller instance
     * 
     * @return void
     */
    public function __construct(AssignmentService $assignmentService)
    {
        $this->assignmentService = $assignmentService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($ticket_id)
    {
        //
        $collection = $this->assignmentService->getDevelopers($ticket_id);
        return UserResource::collection($collection);
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
    public function store(Request $request, $ticket_id)
    {
        //
        $collection = $this->assignmentService->assignDeveloper($ticket_id, $request->developer_id);
        return AssignmentResource::collection($collection);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function show(Assignment $assignment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function edit(Assignment $assignment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Assignment $assignment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Assignment  $assignment
     * @return \Illuminate\Http\Response
     */
    public function destroy($ticket_id, Assignment $assignment)
    {
        //
        $collection = $this->assignmentService->removeDeveloper($ticket_id, $assignment->developer_id);
        return AssignmentResource::collection($collection);
    }
}
