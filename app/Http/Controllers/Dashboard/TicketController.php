<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Requests\Dashboard\MessageRequest;
use App\Models\Ticket;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::latest()->paginate();

        return view('dashboard.tickets.index', compact('tickets'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        $messages = $ticket->messages()->get();

        return view('dashboard.tickets.show', compact('ticket', 'messages'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\Dashboard\MessageRequest $request
     * @param \App\Models\Ticket $ticket
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function message(MessageRequest $request, Ticket $ticket)
    {
        $request->user()->messages()->create($request->all() + [
                'ticket_id' => $ticket->id
            ]);

        return redirect()->route('dashboard.tickets.show', $ticket);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('dashboard.tickets.index');
    }
}
