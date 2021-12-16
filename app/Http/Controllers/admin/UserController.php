<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\user\StoreRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $data = User::orderBy('created_at', 'DESC')->paginate(5);
        if($search = request()->search){
            $data = User::orderBy('created_at', 'DESC')->where('name','like','%'.$search.'%')->paginate(5);
        }
        return view('admin.users.admin',compact('data'));
    }
    public function staff()
    {
        $data = User::orderBy('created_at', 'DESC')->paginate(5);
        if($search = request()->search){
            $data = User::orderBy('created_at', 'DESC')->where('name','like','%'.$search.'%')->paginate(5);
        }
        return view('admin.users.staff',compact('data'));
    }
    public function user()
    {
        $data = User::orderBy('created_at', 'DESC')->paginate(5);
        if($search = request()->search){
            $data = User::orderBy('created_at', 'DESC')->where('name','like','%'.$search.'%')->paginate(5);
        }
        return view('admin.users.user',compact('data'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->save();
        event(new Registered($user));

        auth()->login($user);

        return redirect()->route('admin.user.admin')->with('success','Add this account success');
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
        //
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
        //
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
