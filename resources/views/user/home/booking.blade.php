@extends('user.museum')
@section('main')

    <section class="shopping-cart spad">
        @csrf
        <div class="container">
            <form id="form-booking">
                <div class="row form form-ticket">
                    <div class="col-lg-12">
                        <label for="date">Choose your date</label>
                        <input type="date" name="date" id="date" class="form-control">
                        <div class="cart-table">
                            <table>
                                <thead>
                                    <tr>
                                        <th>Ticket Name</th>
                                        <th>Description</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                        <th>Resert</th>
                                    </tr>
                                </thead>
                                <tbody id="listTicket">
                                    @foreach ($tickets as $index => $ticket)
                                        <div class="">
                                            <tr>
                                                <td>
                                                    {{ $ticket->name }}
                                                </td>
                                                <td>{{ $ticket->description }}</td>
                                                <td class="al">{{ number_format($ticket->price) }}</td>
                                                <td class="qua-col first-row al">
                                                    <div class="quantity" id="quantity">
                                                        <a class="input-group-text decrement-btn"
                                                            onclick="decrementQuantity({{ $index }},{{ $ticket->price }})">-</a>
                                                        <input
                                                            onblur="blurReload({{ $index }},{{ $ticket->price }})"
                                                            type="text" name="tickets" id="{{ $ticket->id }}"
                                                            class="form-control qty-input-{{ $index }} text-center"
                                                            value="0">
                                                        <a class="input-group-text increment-btn"
                                                            onclick="incrementQuantity({{ $index }},{{ $ticket->price }})">+</a>
                                                    </div>
                                                </td>
                                                <td class="total-price first-row total-{{ $index }} al" value="0">0

                                                </td>
                                                <td class="al"><a class="refresh-btn"
                                                        onclick="refreshQuantity({{ $index }},{{ $ticket->price }})"><img
                                                            src="https://img.icons8.com/material-outlined/24/000000/restart--v1.png" /></a>
                                                </td>
                                            </tr>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-4 offset-lg-8">
                                <div class="proceed-checkout">
                                    <ul>
                                        <h4>Total: </h4>
                                        <li class="cart-total">0</li>
                                        <a class="btn btn-success next">NEXT</a>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row form form-infor" id="form-infor">
                    <div class="col-lg-12">
                        @csrf
                        <h3 align="center">Information</h3>
                        <div class="form-group">
                            <label for="exampleInputName1">Name</label>
                            <input type="text" name="username" class="form-control" id="username"
                                placeholder="Enter your name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="useremail" class="form-control" id="useremail"
                                placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPhone1">Phone number</label>
                            <input type="tel" name="userphone" class="form-control" id="userphone"
                                placeholder="Enter your phone number" pattern="[0][0-9]{9}">
                        </div>
                        <div class="form-group">
                            <a class="btn btn-warning return">Return</a>
                            <button type="sumbit" class="btn btn-primary detail">Information detail</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
@stop()
@section('js')
    <script>
        $(".form-infor").hide();
        var totalActual = 0;
        $(document).ready(function() {
            $('.next').click(function(event, index) {
                const val_tickets = $('input[name=tickets]');
                let isError = false;
                for (let i = 0; i < val_tickets.length; i++) {
                    if (val_tickets[i]['value'] != 0) {
                        isError = true;
                    }
                }
                console.log(isError);
                const cus_date = $('input[name=date]').val();
                const today = dateFormat(new Date(), 'Y-m-d');
                let isErrorDate = false;
                if (cus_date >= today) {
                    isErrorDate = true;
                }
                console.log(isErrorDate);
                event.preventDefault();
                var date = $('input[id=date]').val();
                if (date.length == 0) {
                    swal("Please select date you want!", " ", "error");
                } else if (isError == false) {
                    swal("Please select ticket you want!", " ", "error");
                } else if (isErrorDate == false) {
                    swal("Please choose the correct date format!", " ", "error");
                } else {
                    $(".form-infor").show();
                    $(".form-ticket").hide();
                };
                const cartTotal = array.length > 0 ? array.map(item=>item.total).reduce((p,c) =>  p + c ) : 0 ;
                totalActual += cartTotal;
            });
            $('.return').click(function(event) {
                event.preventDefault();
                $(".form-infor").hide();
                $(".form-ticket").show();
            });
        });
        $(document).on('submit', '#form-booking', function(event) {
            var form_booking = $(this);
            const date = $('#date').val();
            const username = $('#username').val();
            const userphone = $('#userphone').val();
            const useremail = $('#useremail').val();

            event.preventDefault();
            const val_tickets = $('input[name=tickets]');
            const tickets = [];
            for (let i = 0; i < val_tickets.length; i++) {
                if (val_tickets[i]['value'] != 0) {
                    isError = true;
                    let value = val_tickets[i]['value'];
                    let id = val_tickets[i]['id'];
                    tickets.push({
                        id: id,
                        value: value,
                    });
                }
            }

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                method: 'POST',
                url: "/order-detail",
                data: {
                    date: date,
                    tickets: tickets,
                    username: username,
                    useremail: useremail,
                    userphone: userphone,
                },
                type: 'json',
                success: function(data) {
                    if (data.status == 405) {
                        let _html = '';
                        $.each(data['data'], function(key, value) {
                            _html += '<li>' + value + '</li>'
                        });
                        swal.fire({
                            title: data.errors,
                            html: _html,
                            type: 'error'
                        });
                    } else {
                        form_booking.parent().html(data);
                        form_booking.replaceWith(data.url);
                        $(document).ready(function() {

                            $.ajaxSetup({
                                headers: {
                                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                        'content')
                                }
                            });

                            $("#apply").click(function() {
                                const coupon = $('#coupon').val();
                                $.ajax({
                                    method: 'POST',
                                    url: "/discount",
                                    data: {
                                        coupon: coupon,
                                    },
                                    type: 'json',
                                    success: function(data) {
                                        if (coupon.length == 0) {
                                            swal("Please enter the coupon you want!",
                                                " ", "error");
                                        } else {
                                            var reduce = data.reduce;
                                            if (reduce == 0) {
                                                swal("Coupon code does not exist or has expired!",
                                                    "Sorry for the inconvenience",
                                                    "error");
                                            } else {
                                                document.getElementById(
                                                        "discount")
                                                    .innerHTML = reduce;
                                                $("#total").addClass("total");
                                                var price = totalActual - reduce;
                                                document.getElementById(
                                                        "actual-total")
                                                    .innerHTML = price;
                                            }
                                        }
                                    }
                                });
                            });
                        });
                    }
                },
            });
        });
    </script>
@stop()
