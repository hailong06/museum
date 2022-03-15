<div class="container">
    <h1>Details</h1>
    <h6 style="color: red, font-style  : italic">*Please check your information before payment</h6>
    <br>
    <form>
        @csrf
        <div class="col-lg-6">
            <table>
                <tr>
                    <td>Date:</td>
                    <td>{{ $posts['date'] }}</td>
                </tr>
                <tr>
                    <td>Name:</td>
                    <td>{{ $posts['username'] }}</td>
                </tr>
                <tr>
                    <td>Email:</td>
                    <td>{{ $posts['useremail'] }}</td>
                </tr>
                <tr>
                    <td>Phone number:</td>
                    <td>{{ $posts['userphone'] }}</td>
                </tr>
                <tr>
                    <td>Payment method:</td>

                    <td><input type="radio" required name="paymentMethod" value="momo"> Momo
                        <img src="https://upload.wikimedia.org/wikipedia/vi/f/fe/MoMo_Logo.png" alt="" height="30"
                            width="70">
                    </td>
                    <td><input type="radio" required name="paymentMethod" value="vnpay" checked> VNPay
                        <img src="https://marketingworks.vn/storage/logo_company/1616032400.png" alt="" height="30"
                            width="70">
                    </td>
                </tr>
            </table>
        </div>
        <br>
        <p></p>
        <div class="containe">
            <div class="col-lg-12">
                <h3 align="center">Ticket information</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Ticket name</th>
                            <th scope="col">Price</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Total money</th>
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
                            <input type="text" placeholder="Input your discount coupon" name="coupon" id="coupon">
                            <br><p></p>
                            <a class="btn btn-success" id="apply">Apply</a>
                            <h5>Discount:</h5>
                            <li id="discount" name="discount" value="0">0</li>
                        </ul>
                        <ul>
                            <h4>Total: </h4>
                            <li id="total" name="total">{{ number_format(array_sum($total)) }}</li>
                        </ul>
                        <ul>
                            <h4>Payment Total: </h4>
                            <li id="actual-total" name="tickets_actual_total">{{ number_format(array_sum($total)) }}</li>
                        </ul>
                            <a href="{{ route('booking') }}" class="btn btn-danger">Cancel</a>
                            <a class="btn btn-primary" id="pay">Payment</a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
