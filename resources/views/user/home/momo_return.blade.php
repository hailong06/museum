@extends('user.museum')
@section('main')
    </header>
    @csrf
    <div class="container">
        <div class="header clearfix">
            <h1>{{ __('messages.inforBill') }}</h1>
        </div>
        <br>
        <h4 style="color: red; font-style  : italic">{{ __('messages.inforBill_note') }}</h4>
        <br>
        <div class="table-responsive">
            <div class="form-group">
                <label>{{ __('messages.code_orders') }}:</label>
                <label>{{ $_GET['orderId'] }}</label>
            </div>
            <div class="form-group">

                <label>{{ __('messages.price') }}</label>
                <label>{{ number_format($_GET['amount']) }} VNĐ</label>
            </div>
            <div class="form-group">
                <label>{{ __('messages.contentBill') }}</label>
                <label>{{ $_GET['orderInfo'] }}</label>
            </div>
            <div class="form-group">
                <label>{{ __('messages.responseCode') }}</label>
                <label>{{ $_GET['resultCode'] }}</label>
            </div>
            <div class="form-group">
                <label>{{ __('messages.orderType') }}</label>
                <label>{{ $_GET['orderType'] }}</label>
            </div>
            <div class="form-group">
                <label>{{ __('messages.payType') }}</label>
                <label>{{ $_GET['payType'] }}</label>
            </div>
            <div class="form-group">
                <label>{{ __('messages.mesBill') }}</label>
                <label>
                    @if ($_GET['resultCode'] == 0)
                    <span style='color:blue'>{{ __('messages.payment_success') }}</span>
                    @else
                    <span style='color:red'>{{ __('messages.payment_fail') }}</span>
                    @endif
                </label>
            </div>
        </div>
        <a href="{{ route('welcome') }}" class="btn btn-primary">{{ __('messages.backToHome') }}</a>
    </div>
    <br>
@stop()
