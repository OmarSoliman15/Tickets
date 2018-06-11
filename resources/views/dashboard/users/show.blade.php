@extends('adminlte::layout.main', ['title' => trans('users.plural')])

@section('content')
    @component('adminlte::page', ['title' => trans('users.plural'), 'breadcrumb' => ['dashboard.users.show', $user]])
        @component('adminlte::table-box')

            <tr>
                <th>{{ trans('users.attributes.name') }}</th>
                <td>{{ $user->name }}</td>
            </tr>
            <tr>
                <th>{{ trans('users.attributes.email') }}</th>
                <td>{{ $user->email }}</td>
            </tr>

            @slot('footer')
                    {{ $user->present()->editButton }}

                    {{ $user->present()->deleteButton }}
            @endslot

        @endcomponent
    @endcomponent
@endsection
