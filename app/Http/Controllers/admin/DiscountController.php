<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Discount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\discount\StoreDiscountRequest;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(DB::table('discounts')->select('status')->get());
        $data = Discount::orderBy('created_at', 'DESC')->paginate(5);
        $user = User::select('id','name')->get();
        if ($search = request()->search) {
            $data = Discount::orderBy('created_at', 'DESC')
                ->where('name', 'like', '%'.$search.'%')->paginate(5);
        }
        return view('admin.discounts.index', compact('data', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.discounts.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $discount = new Discount();
        $discount->user_id = Auth::user()->id;
        $discount->code = $request->code;
        $discount->condition = $request->condition;
        $discount->reduce = $request->reduce;
        $discount->start = $request->start;
        $discount->end = $request->end;
        $discount->status = $request->status;
        $discount->save();
        return redirect()->route('admin.discount.home')
                ->with('success', 'Add discount code success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $discount = Discount::findOrFail($id);
        return view('admin.discounts.edit', compact('discount'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $discount = Discount::findOrFail($id);
        $discount->user_id = Auth::user()->id;
        $discount->code = $request->code;
        $discount->condition = $request->condition;
        $discount->reduce = $request->reduce;
        $discount->start = $request->start;
        $discount->end = $request->end;
        $discount->status = $request->status;
        $discount->save();
        return redirect()->route('admin.discount.home')
                ->with('success', 'Add discount code success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
