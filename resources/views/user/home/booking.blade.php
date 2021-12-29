@extends('user.museum')
@section('main')

<section class="shopping-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="col-lg-10">
                    <input type="datetime-local">
                </div>
                <div class="cart-table">
                    <table>
                        <thead>
                            <tr>
                                <th class="p-name">Ticket Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>Quantity</th>
                                <th>Total</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ticket as $tickets)
                            <tr>
                                <td class="cart-title first-row">
                                    <h5>{{ $tickets->name }}</h5>
                                </td>
                                <td>{{ $tickets->description }}</td>
                                <td class="p-price first-row">{{ $tickets->price }}</td>
                                <td class="qua-col first-row">
                                    <div class="quantity">
                                        <div class="pro-qty">
                                            <input type="text" value="0">
                                        </div>
                                    </div>
                                </td>
                                <td class="total-price first-row"></td>
                                <td class="close-td first-row"><i class="ti-close"></i></td>
                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <div class="col-lg-4 offset-lg-8">
                        <div class="proceed-checkout">
                            <ul>
                                <li class="subtotal">Subtotal <span>$240.00</span></li>
                                <li class="cart-total">Total <span>$240.00</span></li>
                            </ul>
                            <a href="#" class="proceed-btn">PROCEED TO CHECK OUT</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop()
