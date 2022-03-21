@foreach ($data as $blogs)
    <tr>
        <td>{{ $blogs->title }}</td>
        <td><img class="card-img-top"
            src="{{ asset('resources/admin/upload/blog/' . $blogs->image) }}" width="100px"  height="120" alt="Blog image" /></td>
        <td>{!! Str::limit($blogs->content, 200) !!}</td>
        <td><a href="{{ route('blog-detail', $blogs->id) }}"height="30" class="btn btn-outline-primary"><i class="fas fa-search fa-sm"></i></a></td>
    </tr>
@endforeach
