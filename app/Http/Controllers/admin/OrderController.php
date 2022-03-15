<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Ticket;
use App\Models\Discount;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Order::orderBy('created_at','DESC')
            ->paginate(5);
        $count_data = Order::orderBy('created_at','DESC')->count();
        $ticket_data = Ticket::where('status', Ticket::TICKET_PUBLIC)->get();
        $discount_data = Discount::where('status', Discount::PUBLIC_STATUS)->get();
        if ($search = request()->search) {
            $data = Order::orderBy('created_at', 'DESC')
                ->where('code_order', 'like', '%'.$search.'%')->paginate(5);

        } elseif($search = request()->bookingDate) {
            $data = Order::orderBy('created_at', 'DESC')
                ->where('date', 'like', '%'.$search.'%')->paginate(5);
        }
        return view('admin.orders.index', compact('data','count_data','ticket_data', 'discount_data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $info_order = $request->all();
        $count_data = '';
        $output = '';
        $ticket_data = Ticket::where('status', Ticket::TICKET_PUBLIC)->get();
        $discount_data = Discount::where('status', Discount::PUBLIC_STATUS)->get();

        if ( $info_order['date_order'] == null && $info_order['month_order'] == null) {
            $data = Order::join('order_details', 'orders.id', '=', 'order_details.order_id')
                ->where('order_details.ticket_id', $info_order['ticket_date_order'])
                ->where('status', Order::ORDER_PUBLIC)
                ->get();
            $count_data = $data->count();
            if ($count_data > 0) {
                $output = view('admin.output.output_order', compact('data','count_data','ticket_data', 'discount_data'))->render();
            } else {
                $output = '
                <tr>
                    <td align="center" colspan="12">No Data Found</td>
                </tr>
                ';
            }
            $array = [
                'data' => $output,
                'count_data' => $count_data,
            ];
            return response()->json($array);
        } elseif ($info_order['ticket_date_order'] == null && $info_order['month_order'] == null) {
            $data = Order::where('created_at', $info_order['date_order'])
                ->where('status', Order::ORDER_PUBLIC)
                ->get();

            $count_data = $data->count();
            if ($count_data > 0) {
                $output = view('admin.output.output', compact('data','count_data','ticket_data', 'discount_data'))->render();
            } else {
                $output = '
                <tr>
                    <td align="center" colspan="12">No Data Found</td>
                </tr>
                ';
            }
            $array = [
                'data' => $output,
                'count_data' => $count_data,
            ];
            return response()->json($array);
        } elseif ($info_order['ticket_date_order'] == null && $info_order['date_order'] == null) {
            $data = Order::orderBy('created_at','DESC')
                ->whereMonth('created_at', $info_order['month_order'])
                ->where('status', Order::ORDER_PUBLIC)
                ->get();

            $count_data = $data->count();
            if ($count_data > 0) {
                $output = view('admin.output.output', compact('data','count_data','ticket_data', 'discount_data'))->render();
            } else {
                $output = '
                <tr>
                    <td align="center" colspan="12">No Data Found</td>
                </tr>
                ';
            }
            $array = [
                'data' => $output,
                'count_data' => $count_data,
            ];
            return response()->json($array);
        } elseif ($info_order['month_order'] == null) {
            $data = Order::join('order_details', 'orders.id', '=', 'order_details.order_id')
                ->where('order_details.ticket_id', $info_order['ticket_date_order'])
                ->where('orders.created_at', $info_order['date_order'])
                ->where('status', Order::ORDER_PUBLIC)
                ->get();
            $count_data = $data->count();
            if ($count_data > 0) {
                $output = view('admin.output.output', compact('data','count_data','ticket_data', 'discount_data'))->render();
            } else {
                $output = '
                <tr>
                    <td align="center" colspan="12">No Data Found</td>
                </tr>
                ';
            }
            $array = [
                'data' => $output,
                'count_data' => $count_data,
            ];
            return response()->json($array);
        } elseif ($info_order['date_order'] == null) {
            $data = Order::join('order_details', 'orders.id', '=', 'order_details.order_id')
                ->whereMonth('orders.created_at', $info_order['month_order'])
                ->where('order_details.ticket_id', $info_order['ticket_date_order'])
                ->where('status', Order::ORDER_PUBLIC)
                ->get();
            $count_data = $data->count();
            if ($count_data > 0) {
                $output = view('admin.output.output', compact('data','count_data','ticket_data', 'discount_data'))->render();
            } else {
                $output = '
                <tr>
                    <td align="center" colspan="12">No Data Found</td>
                </tr>
                ';
            }
            $array = [
                'data' => $output,
                'count_data' => $count_data,
            ];
            return response()->json($array);
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $data_order = Order::findOrFail((int)$id);
        $ticket = Ticket::select('id','name')->get();
        $data_order_detail = OrderDetail::orderBy('created_at','DESC')->get();

        return view('admin.orders.detail', compact('data_order_detail','data_order','ticket'));
    }
}
