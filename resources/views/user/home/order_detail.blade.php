<div class="container">
    <h1>Details</h1>
    <h6 style="color: red, font-style  : italic">*Please check your information before payment</h6>
    <br>
    <form>
        @csrf
        <div class="col-lg-6">
            <table>
                <tr>
                    <td>{{ __('messages.choose_date') }}</td>
                    <td>{{ $posts['date'] }}</td>
                </tr>
                <tr>
                    <td>{{ __('messages.name') }}</td>
                    <td>{{ $posts['username'] }}</td>
                </tr>
                <tr>
                    <td>{{ __('messages.email') }}</td>
                    <td>{{ $posts['useremail'] }}</td>
                </tr>
                <tr>
                    <td>{{ __('messages.phone') }}</td>
                    <td>{{ $posts['userphone'] }}</td>
                </tr>
                <tr>
                    <td>{{ __('messages.payment_method') }}</td>

                    <td><input type="radio" required name="paymentMethod" value="momo"> Momo
                        <img src="https://upload.wikimedia.org/wikipedia/vi/f/fe/MoMo_Logo.png" alt="" height="30"
                            width="70">
                    </td>
                    <td><input type="radio" required name="paymentMethod" value="vnpay" checked> VNPay
                        <img src="https://marketingworks.vn/storage/logo_company/1616032400.png" alt="" height="30"
                            width="70">
                    </td>
                </tr>
                @error('paymentMethod')
                    <small style="color:red" class="help-block">{{ $message }}</small>
                @enderror
            </table>
        </div>
        <br>
        <p></p>
        <div class="containe">
            <div class="col-lg-12">
                <h3 align="center">{{ __('messages.ticket_infor') }}</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">{{ __('messages.ticket_name') }}</th>
                            <th scope="col">{{ __('messages.price') }}</th>
                            <th scope="col">{{ __('messages.quantity') }}</th>
                            <th scope="col">{{ __('messages.total') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tickets_info as $ticket_name)
                            <tr>
                                <th scope="row">{{ $ticket_name['id'] }}</th>
                                <td>{{ $ticket_name['name'] }}</td>
                                <td>{{ number_format($ticket_name['price']) }}</td>
                                <td>{{ $ticket_name['value'] }}</td>
                                <td>{{ number_format($total[] = $ticket_name['price'] * $ticket_name['value']) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
                <div class="col-lg-4 offset-lg-8">
                    <div class="proceed-checkout">
                        <ul>
                            <input type="text" placeholder="{{ __('messages.place_coupon') }}" name="coupon" id="coupon">
                            <br>
                            <p></p>
                            <a class="btn btn-success" id="apply">{{ __('messages.apply') }}</a>
                            <h5>{{ __('messages.discount') }}:</h5>
                            <li id="discount" name="discount" value="0">0</li>
                        </ul>
                        <ul>
                            <h4>{{ __('messages.total') }}: </h4>
                            <li id="total" name="total">{{ number_format(array_sum($total)) }}</li>
                        </ul>
                        <ul>
                            <h4>{{ __('messages.payment_total') }}: </h4>
                            <li id="actual-total" name="tickets_actual_total">{{ number_format(array_sum($total)) }}
                            </li>
                        </ul>
                        <a href="{{ route('booking') }}" class="btn btn-danger">{{ __('messages.cancel') }}</a>
                        <a class="btn btn-primary" name="payUrl" id="pay">{{ __('messages.payment') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
