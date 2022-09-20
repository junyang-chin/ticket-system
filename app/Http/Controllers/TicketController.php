<?php

namespace App\Http\Controllers;

use App\Http\Requests\SearchTicketRequest;
use App\Http\Resources\TicketResource;
use App\Models\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Ticket::class, 'ticket'); // apply the resource policy to the resource controller then to the model
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return TicketResource::collection(Auth::user()->tickets);
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
    public function store(Request $request) //TODO validate request
    {
        //
        $ticket = Auth::user()->tickets()->create($request->all());
        return TicketResource::make($ticket);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
        return new TicketResource(Ticket::findorFail($ticket->id));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ticket $ticket) //TODO validate reqeust
    {
        //
        $ticket = Ticket::findorFail($ticket->id);
        $ticket->update($request->all());
        return new TicketResource($ticket);
        abort(403);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
        $ticket->delete();
        return response(null, 204);
        abort(403);
    }

    //for search
    public function search(SearchTicketRequest $request)
    {
        $collection = Ticket::query()
            ->when($request->user_id, function ($q) use ($request) {
                // find by user id
                $q->where('user_id', $request->user_id);
            })
            ->when($request->search_title, function ($q) use ($request) {
                // find by title
                $q->where('title', 'like', "%$request->search_title%");
            })
            ->when($request->search_status, function ($q) use ($request) {
                // find by relation 1-1
                $q->whereHas('status', function ($q) use ($request) {

                    // find by status name
                    $q->where('status', $request->search_status);
                });
            })
            ->when($request->search_category, function ($q) use ($request) {
                //  find by relation 1-1
                $q->whereHas('category', function ($q) use ($request) {
                    // find by category name
                    $q->where('name', $request->search_category);
                });
            })
            ->get();
            
            return TicketResource::collection($collection);
    }
}
