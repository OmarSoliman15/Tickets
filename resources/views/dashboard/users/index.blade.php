@extends('adminlte::layout.main', ['title' => trans('users.plural')])

@section('content')
    @component('adminlte::page', ['title' => trans('users.plural'), 'breadcrumb' => 'dashboard.users.index'])
        @component('adminlte::table-box', ['collection' => $users])
            @slot('title') @endslot
            @slot('tools')
                {{ present('users')->createButton }}
            @endslot
            <tr>
                <th>#</th>
                <th style="width: 90px;">{{ trans('users.attributes.avatar') }}</th>
                <th>{{ trans('users.attributes.name') }}</th>
                <th>{{ trans('users.attributes.email') }}</th>
                <th>...</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>
                        {{ $user->present()->thumbAvatar }}
                    </td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        {{ $user->present()->controlButton }}
                    </td>
                </tr>
            @endforeach
        @endcomponent
    @endcomponent
@endsection
