<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ticket;
use App\Models\Discount;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Models\Banner;
use Carbon\Exceptions\Exception;
use Mail;
use Config;
use Carbon\Carbon;
use App\Http\Requests\viewOrder\OrderDetailRequest;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::where('status', Ticket::TICKET_PUBLIC)->get();
        return view('user.home.booking', compact('tickets'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orderDetail(Request $request)
    {
        $validate = Validator::make(
            $request->all(),
            [
                'username' => 'required|max: 50|min:10',
                'useremail' => 'required|email|min: 12',
                'userphone' => 'required|regex:/(0)[0-9]{9}/|min: 10|max: 12',
                'date' => 'required|date|after_or_equal:today',
                "tickets.*" => 'distinct|min:1|max:10',
            ],
        );
        if ($validate->fails()) {
            $hasError = $validate->errors();
            $errors = [];
            foreach ($hasError->all() as $err) {
                $errors[] = $err;
            }
            return response()->json(
                [
                    'data' => $errors,
                    'status' => 405,
                    'errors' => 'Erorrs',
                ]
            );
        } else {
            $posts = $request->except('_token');
            $name_tickets = DB::table('tickets')
                ->select('id', 'name', 'price')
                ->get();
            $tickets_info = [];
            foreach ($posts['tickets'] as $info) {
                $arr = [
                    'id' => $info['id'],
                    'name' => null,
                    'price' => 0,
                    'value' => $info['value']
                ];
                foreach ($name_tickets as $item) {
                    if ($item->id == $info['id']) {
                        $arr['name'] = $item->name;
                        $arr['price'] = $item->price;
                    }
                }
                $tickets_info[] = $arr;
            }

            if ($posts) {
                return view(
                    'user.home.order_detail',
                    compact('posts', 'tickets_info')
                );
            }
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function discount(Request $request)
    {
        $coupon = $request->all();
        $coupon_dis = DB::table('discounts')
            ->select('code', 'reduce')
            ->where('status', Discount::PUBLIC_STATUS)
            ->get();

        $coupon_infor = [
            'coupon' => $coupon['coupon'],
            'reduce' => 0
        ];
        foreach ($coupon_dis as $cp) {
            if ($cp->code == $coupon['coupon']) {
                $coupon_infor['reduce'] = $cp->reduce;
            } else {
                alert()->error('Coupon code does not exist or has expired!', 'Sorry for the inconvenience');
            }
        }

        return response()->json($coupon_infor);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $returnData = [];

    public function payment(OrderDetailRequest $request)
    {
        $code_id = time() . "";
        $info_data = $request->all();
        $infor_total = $info_data['totalActual'];
        $infor_date = $info_data['date'];
        $infor_tickets = $info_data['tickets'];
        $infor_name = $info_data['username'];
        $infor_email = $info_data['useremail'];
        $infor_phone = $info_data['userphone'];
        $infor_paymentMethod = $info_data['paymentMethod'];
        $coupon = $info_data['coupon'];
        $infor_paymentTotal = $info_data['prices'];

        if ($coupon === null) {
            $infor_coupon = 0;
        } else {
            $infor_coupon = $coupon;
        }
        if ($infor_paymentMethod == "vnpay") {

            error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
            date_default_timezone_set('Asia/Ho_Chi_Minh');

            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";

            $vnp_TxnRef = $code_id;
            $vnp_OrderInfo = 'Payment orders';
            $vnp_OrderType = 'Billpayment';
            $vnp_Amount = $infor_paymentTotal * 100;
            $vnp_Locale = 'VND';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => config('app.vnp_tmn_code'),
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => route('vnpayreturn'),
                "vnp_TxnRef" => $vnp_TxnRef
            );

            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }

            $vnp_Url = config('app.vnp_url') . "?" . $query;

            if (config('app.vnp_has')) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, config('app.vnp_has'));
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = [
                'code' => '00',
                'message' => 'success',
                'data' => $vnp_Url,
                "InforDate" => $infor_date,
                "InforTicket" => $infor_tickets,
                "InforName" => $infor_name,
                "InforEmail" => $infor_email,
                "InforPhone" => $infor_phone,
                "InforPaymentMethod" => $infor_paymentMethod,
                "InforCoupon" => $infor_coupon,
                "InforTotal" => $infor_total,
                "InforPaymentTotal" => $infor_paymentTotal,
                "orderId" => $vnp_TxnRef,
            ];
            session()->put($returnData);
            return response()->json($returnData);
        } else if ($infor_paymentMethod == "momo") {
            $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

            $partnerCode = config('app.momo_partnerCode');
            $accessKey = config('app.momo_accessKey');
            $secretKey = config('app.momo_secretKey');
            $orderInfo = "Payment orders";
            $amount = $infor_paymentTotal;
            $orderId = time() . "";
            $redirectUrl = route('momoreturn');
            $ipnUrl = route('momoreturn');
            $extraData = "";

            $requestId = time() . "";
            $requestType = "payWithATM";
            $rawHash = "accessKey=" . $accessKey . "&amount=" . $amount . "&extraData=" . $extraData . "&ipnUrl=" . $ipnUrl . "&orderId=" . $orderId . "&orderInfo=" . $orderInfo . "&partnerCode=" . $partnerCode . "&redirectUrl=" . $redirectUrl . "&requestId=" . $requestId . "&requestType=" . $requestType;
            $signature = hash_hmac("sha256", $rawHash, $secretKey);
            $data = [
                'code' => '0',
                'partnerCode' => $partnerCode,
                'partnerName' => "Test",
                "storeId" => "MomoTestStore",
                'requestId' => $requestId,
                'amount' => $amount,
                'orderId' => $orderId,
                'orderInfo' => $orderInfo,
                'redirectUrl' => $redirectUrl,
                'ipnUrl' => $ipnUrl,
                'lang' => 'vi',
                'extraData' => $extraData,
                'requestType' => $requestType,
                'signature' => $signature,
                "InforDate" => $infor_date,
                "InforTicket" => $infor_tickets,
                "InforName" => $infor_name,
                "InforEmail" => $infor_email,
                "InforPhone" => $infor_phone,
                "InforPaymentMethod" => $infor_paymentMethod,
                "InforCoupon" => $infor_coupon,
                "InforTotal" => $infor_total,
                "InforPaymentTotal" => $infor_paymentTotal,
            ];
            session()->put($data);
            $result = $this->execPostRequest($endpoint, json_encode($data));
            $jsonResult = json_decode($result, true);
            return $jsonResult;
        } else {
            alert()->error('Choose your payment method please', '');
        }
    }

    public function vnpayReturn(Request $request)
    {
        $infor = $request->session()->all();
        $check_order_code = DB::table('orders')->where('code_order', $infor['orderId'])->exists();

        if ($check_order_code == true) {
            $tickets = Ticket::all();
            return view('user.home.booking', compact('tickets'));
        } else {
            if ($request->vnp_ResponseCode === '00') {
                try {
                    DB::beginTransaction();
                    $vnpayData = $request->all();
                    $infor = $request->session()->all();

                    $coupon_dis = DB::table('discounts')
                        ->select('id', 'code', 'reduce')
                        ->where('status', Discount::PUBLIC_STATUS)
                        ->get();
                    $coupon_infor = [
                        'id' => '',
                        'coupon' => $infor['InforCoupon'],
                        'reduce' => 0
                    ];
                    $coupon_id = '';
                    foreach ($coupon_dis as $cp) {
                        if ($cp->code == $infor['InforCoupon']) {
                            $coupon_infor['id'] = $cp->id;
                            $coupon_infor['reduce'] = $cp->reduce;
                        } else if ($infor['InforCoupon'] === 0 || empty($infor['InforCoupon'])) {
                            $coupon_infor['id'] = null;
                            $coupon_infor['reduce'] = 0;
                        }
                        $coupon_id = $coupon_infor;
                    }

                    $name_tickets = DB::table('tickets')
                        ->select('id', 'name', 'price')
                        ->get();
                    $tickets_info = [];
                    foreach ($infor['InforTicket'] as $info) {
                        $arr = [
                            'id' => $info['id'],
                            'name' => null,
                            'price' => 0,
                            'value' => $info['value']
                        ];
                        foreach ($name_tickets as $item) {
                            if ($item->id == $info['id']) {
                                $arr['name'] = $item->name;
                                $arr['price'] = $item->price;
                            }
                        }
                        $tickets_info[] = $arr;
                    }

                    $orders_id = DB::table('orders')
                        ->insertGetId(
                            [
                                'code_order' => $infor['orderId'],
                                'custumer_name' => $infor['InforName'],
                                'custumer_email' => $infor['InforEmail'],
                                'custumer_phone' => $infor['InforPhone'],
                                'total_money' => $infor['InforTotal'],
                                'actual_total' => $infor['InforPaymentTotal'],
                                'payment_method' => $infor['InforPaymentMethod'],
                                'discount_id' => $coupon_id['id'],
                                'date' => $infor['InforDate'],
                                'created_at' => Carbon::now(),
                            ]
                        );
                    foreach ($infor['InforTicket'] as $item) {
                        DB::table('order_details')
                            ->insert(
                                [
                                    'order_id' => $orders_id,
                                    'ticket_id' => $item['id'],
                                    'quantity' => $item['value'],
                                    'created_at' => Carbon::now(),
                                ]
                            );
                    }

                    DB::commit();
                    $to_name = $infor['InforName'];
                    $to_email = $infor['InforEmail'];

                    Mail::send(
                        'user.mail.form_email',
                        compact('infor', 'tickets_info', 'coupon_id'),
                        function ($message) use ($to_name, $to_email) {
                            $message->to($to_email)->subject('Ticket information');
                            $message->from($to_email, $to_name);
                        }
                    );

                    return view('user.home.vnpay_return');
                } catch (Exception $exception) {
                    $request->session()->flash('message', 'ERROR! AN ERROR OCCURRED. PLEASE TRY AGAIN LATER!');
                }
            } else {
                $slider = Banner::where('status',Banner::BANNER_PUBLIC)->get();
                $count_slider = Banner::where('status',Banner::BANNER_PUBLIC)->count();
                $data = Blog::orderBy('updated_at', 'DESC')
                    ->where('status', BLog::BLOG_PUBLIC)->paginate(4);
                $request->session()->flash('status', 'ERROR! AN ERROR OCCURRED. PLEASE TRY AGAIN LATER!');
                return view('user.home.welcome', compact('data', 'slider', 'count_slider'));
            }
        }
    }
    public function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(
            $ch,
            CURLOPT_HTTPHEADER,
            array(
                'Content-Type: application/json',
                'Content-Length: ' . strlen($data)
            )
        );
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        //execute post
        $result = curl_exec($ch);
        //close connection
        curl_close($ch);
        return $result;
    }
    public function momoReturn(Request $request)
    {
        $infor = $request->session()->all();
        $check_order_code = DB::table('orders')->where('code_order', $infor['orderId'])->exists();

        if ($check_order_code == true) {
            $tickets = Ticket::all();
            return view('user.home.booking', compact('tickets'));
        } else {
            if ($request->resultCode === '0') {
                try {
                    DB::beginTransaction();
                    $momoPay = $request->all();

                    $coupon_dis = DB::table('discounts')
                        ->select('id', 'code', 'reduce')
                        ->where('status', Discount::PUBLIC_STATUS)
                        ->get();
                    $coupon_infor = [
                        'id' => '',
                        'coupon' => $infor['InforCoupon'],
                        'reduce' => 0
                    ];
                    $coupon_id = '';
                    foreach ($coupon_dis as $cp) {
                        if ($cp->code == $infor['InforCoupon']) {
                            $coupon_infor['id'] = $cp->id;
                            $coupon_infor['reduce'] = $cp->reduce;
                        } else if ($infor['InforCoupon'] === 0 || empty($infor['InforCoupon'])) {
                            $coupon_infor['id'] = null;
                            $coupon_infor['reduce'] = 0;
                        }
                        $coupon_id = $coupon_infor;
                    }

                    $name_tickets = DB::table('tickets')
                        ->select('id', 'name', 'price')
                        ->get();
                    $tickets_info = [];
                    foreach ($infor['InforTicket'] as $info) {
                        $arr = [
                            'id' => $info['id'],
                            'name' => null,
                            'price' => 0,
                            'value' => $info['value']
                        ];
                        foreach ($name_tickets as $item) {
                            if ($item->id == $info['id']) {
                                $arr['name'] = $item->name;
                                $arr['price'] = $item->price;
                            }
                        }
                        $tickets_info[] = $arr;
                    }

                    $orders_id = DB::table('orders')
                        ->insertGetId(
                            [
                                'code_order' => $infor['orderId'],
                                'custumer_name' => $infor['InforName'],
                                'custumer_email' => $infor['InforEmail'],
                                'custumer_phone' => $infor['InforPhone'],
                                'total_money' => $infor['InforTotal'],
                                'actual_total' => $infor['InforPaymentTotal'],
                                'payment_method' => $infor['InforPaymentMethod'],
                                'discount_id' => $coupon_id['id'],
                                'date' => $infor['InforDate'],
                                'created_at' => Carbon::now(),
                            ]
                        );
                    foreach ($infor['InforTicket'] as $item) {
                        DB::table('order_details')
                            ->insert(
                                [
                                    'order_id' => $orders_id,
                                    'ticket_id' => $item['id'],
                                    'quantity' => $item['value'],
                                    'created_at' => Carbon::now(),
                                ]
                            );
                    }

                    DB::commit();
                    $to_name = $infor['InforName'];
                    $to_email = $infor['InforEmail'];

                    Mail::send(
                        'user.mail.form_email',
                        compact('infor', 'tickets_info', 'coupon_id'),
                        function ($message) use ($to_name, $to_email) {
                            $message->to($to_email)->subject('Ticket information');
                            $message->from($to_email, $to_name);
                        }
                    );

                    return view('user.home.momo_return');
                } catch (Exception $exception) {
                    session()->flush();
                    $request->session()->flash('message', 'ERROR! AN ERROR OCCURRED. PLEASE TRY AGAIN LATER!');
                }
            } else {
                session()->flush();
                $slider = Banner::where('status',Banner::BANNER_PUBLIC)->get();
                $count_slider = Banner::where('status',Banner::BANNER_PUBLIC)->count();
                $data = Blog::orderBy('updated_at', 'DESC')
                    ->where('status', BLog::BLOG_PUBLIC)->paginate(4);
                $request->session()->flash('status', 'ERROR! AN ERROR OCCURRED. PLEASE TRY AGAIN LATER!');
                return view('user.home.welcome', compact('data', 'slider', 'count_slider'));
            }
        }
    }
}
