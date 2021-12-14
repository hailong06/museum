@extends('admin.master')
@section('title', 'Category List')
@section('main')

    <form action="" method="get" class="form-inline">
        <div class="form-group">
            <input class="form-control" name="search" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-search"></i>
        </button>
    </form>
    <table class="table table-hover">
        <thead>
            <tr>
                <td>Id</td>
                <td>User_id</td>
                <td>Name</td>
                <td>Status</td>
                <td>Created Date</td>
                <td>Updated Date</td>
                <td class="text-right">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $key)
                <tr>
                    <td>{{ $key->id }}</td>
                    <td>{{ $key->user_id }}</td>
                    <td>{{ $key->name }}</td>
                    <td>
                        @if ($key->status == 0)
                            <span class="badge badge-danger">Private</span>
                        @else
                            <span class="badge badge-success">Public</span>
                        @endif
                    </td>
                    <td>{{ $key->created_at->format('d-m-Y') }}</td>
                    <td>{{ $key->updated_at->format('d-m-Y') }}</td>
                    <td class="text-right">

                        <a href="{{ route('admin.category.edit', $key->id) }}" class="btn btn-sm btn-success">
                            <i class="fas fa-edit"></i>
                        </a>

                        <a href="{{ route('admin.category.destroy', $key->id) }}" class="btn btn-sm btn-danger btndelete">
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

            if (confirm('Are you sure about that?')) {
                $('form#form-delete').submit();
            }

        })
    </script>



@stop()
