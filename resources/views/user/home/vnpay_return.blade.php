@extends('user.museum')
@section('main')
    @csrf
    <div class="container">
        <div class="header clearfix">
            <h1>Information line </h1>
        </div>
        <br><h4 style="color: red; font-style  : italic">*Please double check the ticket information in the email</h4>
        <br>
        <div class="table-responsive">
            <div class="form-group">
                <label>Code orders:</label>
                <label>{{ $_GET['vnp_TxnRef'] }}</label>
            </div>
            <div class="form-group">

                <label>Price:</label>
                <label>{{ number_format($_GET['vnp_Amount'] / 100) }} VNĐ</label>
            </div>
            <div class="form-group">
                <label>Content billing:</label>
                <label>{{ $_GET['vnp_OrderInfo'] }}</label>
            </div>
            <div class="form-group">
                <label>Response Code:</label>
                <label>{{ $_GET['vnp_ResponseCode'] }}</label>
            </div>
            <div class="form-group">
                <label>Transaction code at VNPAY:</label>
                <label>{{ $_GET['vnp_TransactionNo'] }}</label>
            </div>
            <div class="form-group">
                <label>Bank code:</label>
                <label>{{ $_GET['vnp_BankCode'] }}</label>
            </div>
            <div class="form-group">
                <label>Payment time:</label>
                <label>{{ $_GET['vnp_PayDate'] }}</label>
            </div>
            <div class="form-group">
                <label>Kết quả:</label>
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
                            echo "<span style='color:red'>Chu ky khong hop le</span>";
                        }
                    @endphp

                </label>
            </div>
        </div>
        <a href="{{ route('welcome') }}" class="btn btn-primary">Back to the home page</a>
    </div>
    <br>
@stop()
