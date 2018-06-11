@extends('adminlte::layout.main', ['title' => trans('tickets.plural')])

@section('content')
    @component('adminlte::page', ['title' => trans('tickets.plural'), 'breadcrumb' => 'dashboard.tickets.index'])
        @component('adminlte::table-box', ['collection' => $tickets])
            @slot('title') @endslot
            <tr>
                <th>#</th>
                <th style="width: 90px;">{{ trans('tickets.attributes.avatar') }}</th>
                <th>{{ trans('tickets.attributes.body') }}</th>
                <th>{{ trans('tickets.attributes.type') }}</th>
                <th>{{ trans('tickets.attributes.status') }}</th>
                <th>...</th>
            </tr>
            @foreach ($tickets as $ticket)
                <tr>
                    <td>{{ $ticket->id }}</td>
                    <td>
                        {{ $ticket->present()->thumbAvatar }}
                    </td>
                    <td>{{ str_limit($ticket->body, 50) }}</td>
                    <td>{{ trans('tickets.types.options')[$ticket->type] }}</td>
                    <td>{{ trans('tickets.statuses.options')[$ticket->status] }}</td>
                    <td>
                        {{ $ticket->present()->controlButton }}
                    </td>
                </tr>
            @endforeach
        @endcomponent
    @endcomponent
@endsection
