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
<form method="GET" action="" id="form-delete">
    @csrf
</form>
