@extends('admin.master')
@section('title', 'Order Detai')
@section('main')
    <h1>Order Detail</h1>
    <table class="table">
        <thead>
            <tr>
                <td>Order Code</td>
                <td>Ticket</td>
                <td>Quantity</td>
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
    <a href="{{ route('admin.order.home') }}" class="btn btn-primary">Back</a>
@stop
