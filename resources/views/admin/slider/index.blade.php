@extends('admin.master')
@section('title', 'Slider List')
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
                <td>Image</td>
                <td>Description</td>
                <td>Status</td>
                <td>Link</td>
                <td>Created Date</td>
                <td>Updated Date</td>
                <td class="text-right">Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $slider)
                <tr>
                    <td>{{ $slider->id }}</td>
                    <td>{{ $slider->user_id }}</td>
                    <td>{{ $slider->name }}</td>
                    <td><img src="{{ asset('resources/admin/upload/blog/'.$slider->image) }}" height="80" width="130" alt="Slider image"></td>
                    <td>{{ $slider->description }}</td>
                    <td>
                        @if ($slider->status == 0)
                            <span class="badge badge-danger">Private</span>
                        @else
                            <span class="badge badge-success">Public</span>
                        @endif
                    </td>
                    <td>{{ $slider->link }}</td>

                    <td>{{ $slider->created_at->format('d-m-Y') }}</td>
                    <td>{{ $slider->updated_at->format('d-m-Y') }}</td>
                    <td class="text-right">

                        <a href="{{ route('admin.slider.edit', $slider->id) }}" class="btn btn-sm btn-success">
                            <i class="fas fa-edit"></i>
                        </a>

                        <a href="{{ route('admin.slider.destroy', $slider->id) }}" class="btn btn-sm btn-danger btndelete">
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
