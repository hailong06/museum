@extends('user.museum')
@section('main')
</header>
    @csrf
    <div class="container">
        <div class="header clearfix">
            <h1>{{ __('messages.information') }}</h1>
        </div>
        <br><h4 style="color: red; font-style  : italic">{{ __('messages.inforBill_note') }}</h4>
        <br>
        <div class="table-responsive">
            <div class="form-group">
                <label>{{ __('messages.code_orders') }}:</label>
                <label>{{ $_GET['vnp_TxnRef'] }}</label>
            </div>
            <div class="form-group">

                <label>{{ __('messages.price') }}:</label>
                <label>{{ number_format($_GET['vnp_Amount'] / 100) }} VNĐ</label>
            </div>
            <div class="form-group">
                <label>{{ __('messages.contentBill') }}:</label>
                <label>{{ $_GET['vnp_OrderInfo'] }}</label>
            </div>
            <div class="form-group">
                <label>{{ __('messages.responseCode') }}:</label>
                <label>{{ $_GET['vnp_ResponseCode'] }}</label>
            </div>
            <div class="form-group">
                <label>{{ __('messages.transactionCode') }}:</label>
                <label>{{ $_GET['vnp_TransactionNo'] }}</label>
            </div>
            <div class="form-group">
                <label>{{ __('messages.bankCode') }}:</label>
                <label>{{ $_GET['vnp_BankCode'] }}</label>
            </div>
            <div class="form-group">
                <label>{{ __('messages.payTime') }}:</label>
                <label>{{ $_GET['vnp_PayDate'] }}</label>
            </div>
            <div class="form-group">
                <label>{{ __('messages.mesBill') }}:</label>
                <label>
                    @php
                        $vnp_SecureHash = $_GET['vnp_SecureHash'];
                        $vnp_HashSecret = config('app.vnp_has');
                        $inputData = [];
                        foreach ($_GET as $key => $value) {
                            if (substr($key, 0, 4) == 'vnp_') {
                                $inputData[$key] = $value;
                            }
                        }

                        unset($inputData['vnp_SecureHash']);
                        ksort($inputData);
                        $i = 0;
                        $hashData = '';
                        foreach ($inputData as $key => $value) {
                            if ($i == 1) {
                                $hashData = $hashData . '&' . urlencode($key) . '=' . urlencode($value);
                            } else {
                                $hashData = $hashData . urlencode($key) . '=' . urlencode($value);
                                $i = 1;
                            }
                        }

                        $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);

                        if ($secureHash == $vnp_SecureHash) {
                            if ($_GET['vnp_ResponseCode'] == '00') {

                                echo "<span style='color:blue'>Successfull transaction</span>";
                            } else {
                                echo "<span style='color:red'>Transaction failed</span>";
                            }
                        } else {
                            echo "<span style='color:red'>{{ __('messages.Invalid signature') }}</span>";
                        }
                    @endphp

                </label>
            </div>
        </div>
        <a href="{{ route('welcome') }}" class="btn btn-primary">{{ __('messages.backToHome') }}</a>
    </div>
    <br>
@stop()
