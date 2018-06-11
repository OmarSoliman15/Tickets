<?php

namespace App\Http\Controllers\Api;

use App\Models\Ticket;
use App\Http\Controllers\Controller;
use App\Http\Resources\TicketResource;
use App\Http\Requests\Api\TicketRequest;

class TicketController extends Controller
{
    /**
     * TicketController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index()
    {
        $tickets = auth()->user()->tickets();

        if (request()->filled('type')) {
            $tickets->whereType(request('type'));
        }

        $tickets = $tickets->latest()->paginate();

        return TicketResource::collection($tickets);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Api\TicketRequest $request
     * @return \App\Http\Resources\TicketResource
     */
    public function store(TicketRequest $request)
    {
        $ticket = auth()->user()->tickets()->create($request->all() + [
            'status' => 1
            ]);

        $ticket->addOrUpdateMediaFromRequest('avatar');

        return new TicketResource($ticket);
    }

    /**
     * Show specific ticket.
     *
     * @param \App\Models\Ticket $ticket
     * @return \App\Http\Resources\TicketResource
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Ticket $ticket)
    {
        return new TicketResource($ticket);
    }
}
