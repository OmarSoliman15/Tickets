<?php

// Home / Tickets
Breadcrumbs::register('dashboard.tickets.index', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard.home');
    $breadcrumbs->push(trans('tickets.actions.list'), route('dashboard.tickets.index'), ['icon' => 'fa fa-ticket']);
});

// Home / tickets / Create
Breadcrumbs::register('dashboard.tickets.create', function ($breadcrumbs) {
    $breadcrumbs->parent('dashboard.tickets.index');
    $breadcrumbs->push(trans('tickets.actions.create'), route('dashboard.tickets.create'), ['icon' => 'fa fa-ticket']);
});

// Home / tickets / {ticket}
Breadcrumbs::register('dashboard.tickets.show', function ($breadcrumbs, $ticket) {
    $breadcrumbs->parent('dashboard.tickets.index');
    $breadcrumbs->push(str_limit($ticket->body, 20), route('dashboard.tickets.show', $ticket), ['icon' => 'fa fa-ticket']);
});

// Home / tickets / {ticket} / Edit
Breadcrumbs::register('dashboard.tickets.edit', function ($breadcrumbs, $ticket) {
    $breadcrumbs->parent('dashboard.tickets.show', $ticket);
    $breadcrumbs->push(trans('tickets.actions.edit'), route('dashboard.tickets.edit', $ticket), ['icon' => 'fa fa-edit']);
});
