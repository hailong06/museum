<?php

namespace App\Http\Controllers\admin;

use App\Models\User;
use App\Models\Ticket;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ticket\StoreTicketRequest;
use App\Http\Requests\ticket\UpdateTicketRequest;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Ticket::orderBy('created_at', 'DESC')->paginate(5);
        $user = User::select('id','name')->get();
        if ($search = request()->search) {
            $data = Ticket::orderBy('created_at', 'DESC')
                ->where('name', 'like', '%'.$search.'%')->paginate(5);
        }
        return view('admin.tickets.index', compact('data', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tickets.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketRequest $request)
    {
        $ticket = new Ticket();
        $ticket->user_id = Auth::user()->id;
        $ticket->name = $request->name;
        if ($request->price < 1000 ) {
            $ticket->price = $request->price * 1000;
        }
        $ticket->status = $request->status;
        $ticket->description = $request->description;
        $ticket->save();
        return redirect()->route('admin.ticket.home')
                ->with('success', 'Add this ticket success');
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
        $ticket = Ticket::findOrFail($id);
        return view('admin.tickets.edit', compact('ticket'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketRequest $request, $id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->user_id = Auth::user()->id;
        $ticket->name = $request->name;
        if ($request->price < 1000 ) {
            $ticket->price = $request->price * 1000;
        }
        $ticket->status = $request->status;
        $ticket->description = $request->description;
        $ticket->save();
        return redirect()->route('admin.ticket.home')
            ->with('success', 'Update this ticket success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ticket = Ticket::findOrFail($id);
        $ticket->delete();
        return redirect()->route('admin.ticket.home')
            ->with('success', 'Delete this product success');
    }
}
