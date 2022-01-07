<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Ticket;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Discount;
use RealRashid\SweetAlert\Facades\Aler;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();
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
            $request->all(), [
            'username' => 'required|max: 50|min:10',
            'useremail' => 'required|email|min: 11',
            'userphone' => 'required|alpha_num|min: 10|max: 15',
            'date' => 'required|date|after_or_equal:today',
            "tickets.*" => 'distinct|min:1|max:10',
            ], [
            'username.required'=>'No name to blank',
            'username.max'=>'Can only enter up to 50 characters',
            'useremail.required'=>'No email to blank',
            'useremail.email'=>'Please enter correct email format',
            'userphone.required'=>'No phone-number to blank',
            'userphone.min'=>'Phone number cannot be less than 10 characters',
            'userphone.max'=>'Phone number cannot be more than 15 characters',
            ]
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
                    'user.home.order_detail', compact('posts', 'tickets_info')
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
                alert()->error('Title', 'Lorem Lorem Lorem');
            }
        }

        return response()->json($coupon_infor);
    }
}


