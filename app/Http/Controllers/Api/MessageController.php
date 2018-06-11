<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\MessageRequest;
use App\Http\Resources\MessageResource;
use App\Models\Ticket;
use App\Http\Controllers\Controller;
use App\Http\Resources\TicketResource;

class MessageController extends Controller
{
    /**
     * MessageController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    /**
     * Display a listing of the resource.
     *
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Ticket $ticket)
    {
        $messages = $ticket->messages()->latest()->paginate();

        return MessageResource::collection($messages);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Api\MessageRequest|\App\Http\Requests\Api\TicketRequest $request
     * @param \App\Models\Ticket $ticket
     * @return \App\Http\Resources\TicketResource
     */
    public function store(MessageRequest $request, Ticket $ticket)
    {
        $request->user()->messages()->create($request->all() + [
                'ticket_id' => $ticket->id
            ]);

        return new TicketResource($ticket);
    }
}
