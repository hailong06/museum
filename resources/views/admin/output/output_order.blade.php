@foreach ($data as $key)
    <input type="hidden" value="{{ $key->id }}" id="id">
    <tr>
        <td>{{ $key->code_order }}</td>
        <td>{{ $key->custumer_name }}</td>
        <td>{{ $key->custumer_email }}</td>
        <td>{{ $key->custumer_phone }}</td>
        <td>{{ number_format($key->total_money) }}</td>
        <td>{{ $key->actual_total }}</td>
        <td>{{ $key->payment_method }}</td>
        @foreach ($discount_data as $dis_id)
            @if ($dis_id->id == $key->discount_id)
                <td>{{ $dis_id->code }}</td>
            @elseif ($key->discount_id === null)
                <td></td>
            @break
        @endif
    @endforeach
    <td>{{ $key->date }}</td>
    <td>
        @if ($key->status == 0)
            <span class="badge badge-danger">Private</span>
        @else
            <span class="badge badge-success">Public</span>
        @endif
    </td>
    <td>{{ $key->created_at }}</td>
    <td class="text-right">
        <a href="{{ route('admin.order.detail', $key->id) }}" class="btn btn-sm btn-success">
            Detail
        </a>
    </td>
</tr>
@endforeach
