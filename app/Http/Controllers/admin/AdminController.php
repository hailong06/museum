<?php

namespace App\Http\Controllers\admin;

use Charts;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Order;
use App\Models\Ticket;
use App\Models\OrderDetail;
use Chartisan\PHP\Chartisan;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\BaseChart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function dashboard()
    {
        $today_total = Order::select(DB::raw('SUM(actual_total) as today_total'))
            ->where("created_at", Carbon::today())
            ->pluck("today_total");
        $month_total = Order::select(DB::raw('SUM(actual_total) as month_total'))
            ->whereMonth("created_at", Carbon::today())
            ->pluck("month_total");
        $orders = Order::select(DB::raw('count(*) as orders'))
            ->whereMonth("created_at", Carbon::today())
            ->pluck("orders");
        $user = User::select(DB::raw('count(*) as user'))
            ->whereNotIn('role', [User::SUPPER_ADMIN_ROLE])
            ->whereNotIn('role', [User::USER_ROLE])
            ->whereMonth("created_at", Carbon::today())
            ->pluck("user");
            // dd($user);
        $sale = Order::select(DB::raw('SUM(actual_total) as total'))
            ->whereYear("created_at", date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck("total");
        $months = Order::select(DB::raw('Month(created_at) as month'))
            ->whereYear("created_at", date('Y'))
            ->groupBy(DB::raw("Month(created_at)"))
            ->pluck("month");
        $datas = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);
        foreach ($months as $index => $month) {
            $datas[$month] = (int)$sale[$index];
        }

        $tickets = OrderDetail::select(DB::raw('count(ticket_id) as quantity'))
            ->where('order_details.ticket_id', 1)
            ->groupBy(DB::raw("Date(created_at)"))
            ->pluck("quantity");

        $dt = array(0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

        foreach ($months as $index => $month) {
            $dt[$month] = $tickets[$index];
        }
        return view('admin.home.dashboard', compact('datas', 'dt', 'today_total', 'month_total', 'orders', 'user'));
    }

    public function changeLanguage($locale)
    {
        App::setLocale($locale);
        session()->put('locale', $locale);

        return redirect()->back();
    }
}
