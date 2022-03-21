@extends('user.museum')
@section('main')
    </header>
    @csrf
    <div class="container">
        <div class="header clearfix">
            <h1>Information line </h1>
        </div>
        <br>
        <h4 style="color: red; font-style  : italic">*Please double check the ticket information in the email</h4>
        <br>
        <div class="table-responsive">
            <div class="form-group">
                <label>Code orders:</label>
                <label>{{ $_GET['orderId'] }}</label>
            </div>
            <div class="form-group">

                <label>Price:</label>
                <label>{{ number_format($_GET['amount']) }} VNĐ</label>
            </div>
            <div class="form-group">
                <label>Content billing:</label>
                <label>{{ $_GET['orderInfo'] }}</label>
            </div>
            <div class="form-group">
                <label>Response Code:</label>
                <label>{{ $_GET['resultCode'] }}</label>
            </div>
            <div class="form-group">
                <label>Order Type:</label>
                <label>{{ $_GET['orderType'] }}</label>
            </div>
            <div class="form-group">
                <label>Pay Type:</label>
                <label>{{ $_GET['payType'] }}</label>
            </div>
            <div class="form-group">
                <label>Message:</label>
                <label>
                    @if ($_GET['resultCode'] == 0)
                    <span style='color:blue'>Successfull transaction</span>
                    @else
                    <span style='color:red'>Transaction failed</span>
                    @endif
                </label>
            </div>
        </div>
        <a href="{{ route('welcome') }}" class="btn btn-primary">Back to the home page</a>
    </div>
    <br>
@stop()
