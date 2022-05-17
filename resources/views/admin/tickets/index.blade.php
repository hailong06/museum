@extends('admin.master')
@section('title', 'Ticket List')
@section('main')

    <form action="" method="get" class="form-inline">
        <div class="form-group">
            <input class="form-control" name="search" placeholder="{{ __('messages.search') }}">
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-search"></i>
        </button>
    </form>
    <table class="table table-hover">
        <thead>
            <tr>
                <td>{{ __('messages.id') }}</td>
                <td>{{ __('messages.user') }}</td>
                <td>{{ __('messages.name') }}</td>
                <td>{{ __('messages.price') }}</td>
                <td>{{ __('messages.status') }}</td>
                <td>{{ __('messages.description') }}</td>
                <td>{{ __('messages.createdDate') }} </td>
                <td>{{ __('messages.updatedDate') }} </td>
                <td class="text-right">{{ __('messages.action') }}</td>
            </tr>
        </thead>
        <tbody>
            @php
                $i =1;
            @endphp
            @foreach ($data as $key)
                <tr>
                    <td>{{ $i++ }}</td>
                    @foreach ($user as $users)
                    @if ($users->id == $key->user_id)
                    <td>{{ $users->name }}</td>
                    @endif
                    @endforeach
                    <td>{{ $key->name }}</td>
                    <td>{{ $key->price }}</td>
                    <td>
                        @if ($key->status == 0)
                            <span class="badge badge-danger">{{ __('messages.private') }}</span>
                        @else
                            <span class="badge badge-success">{{ __('messages.public') }}</span>
                        @endif
                    </td>
                    <td>{{ $key->description }}</td>
                    <td>{{ $key->created_at->format('d-m-Y') }}</td>
                    <td>{{ $key->updated_at->format('d-m-Y') }}</td>
                    <td class="text-right">

                        <a href="{{ route('admin.ticket.edit', $key->id) }}" class="btn btn-sm btn-success">
                            <i class="fas fa-edit"></i>
                        </a>

                        <a href="{{ route('admin.ticket.destroy', $key->id) }}" class="btn btn-sm btn-danger btndelete">
                            <i class="fas fa-trash"></i>
                        </a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <form method="GET" action="" id="form-delete">
        @csrf
    </form>
    <hr>
    <div class="">
        {{ $data->appends(request()->all())->links() }}
    </div>
@stop()
@section('js')

    <script>
        $('.btndelete').click(function(ev) {
            ev.preventDefault();
            var _href = $(this).attr('href');
            $('form#form-delete').attr('action', _href);

            if (confirm("{{ __('messages.questDelete') }}")) {
                $('form#form-delete').submit();
            }

        })
    </script>



@stop()
