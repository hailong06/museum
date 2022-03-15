@extends('admin.master')
@section('title', 'User List')
@section('main')
<div class="container">
    <div>
        <form >
            <div class="flex-container">
                @csrf
                <div class="fil">
                    <div class="form-group">
                        <input class="form-control" id="search" name="search" placeholder="Search name">
                    </div>
                </div>
                <div class="input-group fil">
                    <select name="user" id="user" class="form-control">
                        <option value="0">User</option>
                        @if (Auth::user()->role == $role_super)
                        <option value="1">SuperAdmin</option>
                        @endif
                        <option value="2">Admin</option>
                        <option value="3">Staff</option>
                    </select>
                </div>
                <div class="fil">
                    <button id="search-user" type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
    </div>
    <div align="center" id="count" class='fil'>
        <label>Number of data:
            <span id="count_data">{{ $count_data }}</span>
        </label>
    </div>
    <table id="datatable" class="table table-hover">
        <thead>
            <tr>
                <td>Id</td>
                <td>Name</td>
                <td>Email</td>
                <td>Address</td>
                <td>Phone</td>
                <td>Created Date</td>
                <td>Updated Date</td>
                <td class="text-right">Action</td>
            </tr>
        </thead>
        <tbody>
            @php
                $i = 1;
            @endphp
            @foreach ($data as $key)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $key->name }}</td>
                    <td>{{ $key->email }}</td>
                    <td style="width: 260px">{{ $key->address }}</td>
                    <td>{{ $key->phone }}</td>
                    <td>{{ $key->created_at->format('d-m-Y') }}</td>
                    <td>{{ $key->updated_at->format('d-m-Y') }}</td>
                    <td class="text-right">
                        @if (Auth::user()->role == $role_super)
                            <a href="{{ route('admin.user.edit', $key->id) }}" class="btn btn-sm btn-success">
                                <i class="fas fa-edit"></i>
                            </a>

                            <a href="{{ route('admin.user.destroy', $key->id) }}" class="btn btn-sm btn-danger btndelete">
                                <i class="fas fa-trash"></i>
                            </a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <form method="GET" action="" id="form-delete">
        @csrf
    </form>
    <hr>
    <div class="pagi">
        {{ $data->appends(request()->all())->links() }}
    </div>
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
        $(document).ready(function() {
            $('#search-user').click(function(event) {
                var user = $('#user').val();
                var search = $('#search').val();
                event.preventDefault();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: 'GET',
                    url: '{{ route('admin.user.filter') }}',
                    data: {
                        user: user,
                        search: search,
                    },
                    type: 'json',
                    success: function(data) {
                        $(".pagi").remove();
                        // $("#count").show();
                        $('tbody').html(data.data);
                        $('#count_data').text(data.count_data);
                    }
                });
            });
        });
    </script>
@stop()
