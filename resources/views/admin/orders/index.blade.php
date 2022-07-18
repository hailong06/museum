@extends('admin.master')
@section('title', 'Order List')
@section('main')
    <div id="content">
        <div class="flex-container">
            <div class="fil">
                <form action="" method="get" class="form-inline fil">
                    <div class="form-group">
                        <input class="form-control" name="search" placeholder="{{ __('messages.search') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-search"></i>
                    </button>
                </form>
            </div>
            <div class="fil">
                <form action="" method="get" class="form-inline fil">
                    <div class="form-group">
                        <span> {{ __('messages.searchBookingDate') }} <input type="date" class="form-control" name="bookingDate"></span>
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
                            <option value="">{{ __('messages.searchM') }}</option>
                            @for ($month = 01; $month <= 12; $month++)
                                <option value="{{ $month }}" checked>{{ $month }}</option>
                            @endfor
                        </select>
                    </div>
                    <div class="input-group fil">
                        <select class="form-control" id="ticket" name="ticket">
                            <option value="">{{ __('messages.searchTicket') }}</option>
                            @foreach ($ticket_data as $items)
                                <option value="{{ $items->id }}">{{ $items->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="input-group fil">
                        <select class="form-control" id="method" name="method">
                            <option value="vnpay">VnPay</option>
                            <option value="momo">Momo</option>
                        </select>
                    </div>
                    <div class="fil">
                        <input type="button" value="Search" class=" btn btn-primary" id="search-date">
                    </div>
                </div>
            </form>
        </div>
        <div align="center" id="count" class='fil'>
            <label>{{ __('messages.numberOfData') }}
                <span id="count_data">{{ $count_data }}</span>
            </label>
        </div>
        <table class="table table-hover" style="padding: 10px 15px">
            <thead>
                <tr>
                    <td>{{ __('messages.code_orders') }}</td>
                    <td>{{ __('messages.cusName') }}</td>
                    <td>{{ __('messages.cusEmail') }}</td>
                    <td>{{ __('messages.cusPhone') }}</td>
                    <td>{{ __('messages.totalMoney') }}</td>
                    <td>{{ __('messages.actualMoney') }}</td>
                    <td>{{ __('messages.payment_method') }}</td>
                    <td>{{ __('messages.discount') }}</td>
                    <td>{{ __('messages.dateBooking') }}</td>
                    <td>{{ __('messages.status') }}</td>
                    <td>{{ __('messages.createdDate') }}</td>
                    <td class="text-right">{{ __('messages.action') }}</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $key)
                    <tr>
                        <td>{{ $key->code_order }}</td>
                        <td>{{ $key->custumer_name }}</td>
                        <td>{{ $key->custumer_email }}</td>
                        <td>{{ $key->custumer_phone }}</td>
                        <td>{{ number_format($key->total_money) }}</td>
                        <td>{{ number_format($key->actual_total) }}</td>
                        <td>{{ $key->payment_method }}</td>
                        <td>{{ $key->discount_id }}</td>
                        <td>{{ $key->date }}</td>
                        <td>
                            @if ($key->status == 0)
                                <span class="badge badge-danger">{{ __('messages.unavailable') }}</span>
                            @else
                                <span class="badge badge-success">{{ __('messages.available') }}</span>
                            @endif
                        </td>
                        <td>{{ $key->created_at }}</td>
                        <td class="text-right">
                            <a href="{{ route('admin.order.detail', $key->id) }}" class="btn btn-sm btn-success">
                                {{ __('messages.detail') }}
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
    $(document).ready(function() {
        $('#search-date').click(function(event) {
            var month_order = $('#month').val();
            var date_order = $('#date').val();
            var ticket_date_order = $('#ticket').val();
            var method_order = $('#method').val();
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
                    method_order: method_order,
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
