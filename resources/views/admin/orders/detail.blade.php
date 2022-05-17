@extends('admin.master')
@section('title', 'Order Detai')
@section('main')
    <h1>{{ __('messages.orderDetail') }}</h1>
    <table class="table">
        <thead>
            <tr>
                <td>{{ __('messages.orderCode') }}</td>
                <td>{{ __('messages.ticket_name') }}</td>
                <td>{{ __('messages.quantity') }}</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($data_order_detail as $items)
                @if ($data_order->id == $items->order_id)
                    <tr>
                        <td>{{ $items->order_id }}</td>
                        @foreach ($ticket as $tickets)
                            @if ($tickets->id == $items->ticket_id)
                                <td>{{ $tickets->name }}</td>
                            @endif
                        @endforeach
                        <td>{{ $items->quantity }}</td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('admin.order.home') }}" class="btn btn-primary">{{ __('messages.back') }}</a>
@stop
