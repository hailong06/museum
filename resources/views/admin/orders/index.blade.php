@extends('admin.master')
@section('title', 'Order List')
@section('main')
    <div id="content">
        <div class="flex-container">
            <div class="fil">
                <form action="" method="get" class="form-inline fil">
                    <div class="form-group">
                        <input class="form-control" name="search" placeholder="Search code order">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            <div class="fil">
                <form action="" method="get" class="form-inline fil">
                    <div class="form-group">
                        <span>Search booing date:  <input type="date" class="form-control" name="bookingDate"></span>
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
        </div>
        <div>
            <form id="search-tickets-day">
                <div class="flex-container">
                    @csrf
                    <div class="input-group fil">
                        <input type="date" onclick="clearMonth()" class="form-control rounded" id="date" name="date" checked>
                    </div>
                    <div class="input-group fil">
                        <select name="month" onclick="clearDate()" id="month" class="form-control">
                            <option value="">Search months--</option>
                            @for ($month = 01; $month <= 12; $month++)
                                <option value="{{ $month }}" checked>{{ $month }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="input-group fil">
                        <select class="form-control" id="ticket" name="ticket">
                            <option value="">Search tickets--</option>
                            @foreach ($ticket_data as $items)
                                <option value="{{ $items->id }}">{{ $items->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="fil">
                        <input type="button" value="Search" class=" btn btn-primary" id="search-date">
                    </div>
                </div>
            </form>
        </div>
        <div align="center" id="count" class='fil'>
            <label>Number of data:
                <span id="count_data">{{ $count_data }}</span>
            </label>
        </div>
        <table class="table table-hover" style="padding: 10px 15px">
            <thead>
                <tr>
                    <td>Code Order</td>
                    <td>Customer Name</td>
                    <td>Customer Email</td>
                    <td>Customer Phone</td>
                    <td>Total Money</td>
                    <td>Actual Money</td>
                    <td>Payment method</td>
                    <td>Discount Code</td>
                    <td>Date</td>
                    <td>Status</td>
                    <td>Created Date</td>
                    <td class="text-right">Action</td>
                </tr>
            </thead>
            <tbody>
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
    $("#count").hide();
     $(document).ready(function() {
        $('#search-date').click(function(event) {
            var month_order = $('#month').val();
            var date_order = $('#date').val();
            var ticket_date_order = $('#ticket').val();
            event.preventDefault();

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'GET',
                url: '{{ route('admin.order.filter') }}',
                data: {
                    date_order: date_order,
                    ticket_date_order: ticket_date_order,
                    month_order: month_order,
                },
                type: 'json',
                success: function(data){
                    $(".pagi").remove();
                    $("#count").show();
                    $('tbody').html(data.data);
                    $('#count_data').text(data.count_data);
                }
            });
        });
    });

    function clearDate(){
        var month_order = $('#month').val();
        if (month_order != ''){
            document.getElementById('date').value = '';
        }
    }
    function clearMonth(){
        document.getElementById("month").value = "";
    }
</script>
@stop()
