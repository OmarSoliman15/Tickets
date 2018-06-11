@extends('adminlte::layout.main', ['title' => trans('tickets.plural')])

@section('content')
    @component('adminlte::page', ['title' => trans('tickets.plural'), 'breadcrumb' => ['dashboard.tickets.show', $ticket]])
        @component('adminlte::table-box')

            <tr>
                <th>{{ trans('tickets.attributes.body') }}</th>
                <td>{{ $ticket->body }}</td>
            </tr>
            <tr>
                <th>{{ trans('tickets.attributes.type') }}</th>
                <td>{{ trans('tickets.types.options')[$ticket->type] }}</td>
            </tr>
            <tr>
                <th>{{ trans('tickets.attributes.status') }}</th>
                <td>{{ trans('tickets.statuses.options')[$ticket->status] }}</td>
            </tr>

            @slot('footer')
                {{ $ticket->present()->deleteButton }}
            @endslot

        @endcomponent
        @component('adminlte::table-box', ['title' => trans('messages.plural')])

            @foreach($messages as $message)
                <div class="box-body">
                    <!-- Conversations are loaded here -->
                    <!-- Message. Default to the left -->
                    <div class="direct-chat-msg">
                        <div class="direct-chat-info clearfix">
                            <span class="direct-chat-name pull-left">{{ $message->user->name }}</span>
                            <span class="direct-chat-timestamp pull-right">{{ $message->created_at->diffForHumans() }}</span>
                        </div>
                        <!-- /.direct-chat-info -->
                        <img class="direct-chat-img" src="{{ $message->user->getFirstOrDefaultMediaUrl() }}"
                             alt="message user image">
                        <!-- /.direct-chat-img -->
                        <div class="direct-chat-text" style="padding: 10px">
                            {{ $message->body }}
                        </div>
                        <!-- /.direct-chat-text -->
                    </div>
                </div>
            @endforeach
            <div class="box-body">

                <div class="input-group">
                    <input type="text" form="omar" name="body" placeholder="@lang('messages.actions.create')"
                           class="form-control" maxlength="500">
                    <span class="input-group-btn">
                            <button type="submit" form="omar"
                                    class="btn btn-danger btn-flat">@lang('forms.add')</button>
                          </span>
                </div>
            </div>
        @endcomponent

        {{ BsForm::post(route('dashboard.tickets.message', $ticket), ['id'=> 'omar']) }}

        {{ BsForm::close() }}
    @endcomponent
@endsection
