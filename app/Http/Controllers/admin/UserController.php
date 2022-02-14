<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\user\StoreRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::user()->role == User::SUPPER_ADMIN_ROLE){
            $role = User::SUPPER_ADMIN_ROLE;
            $data = User::orderBy('created_at', 'DESC')->paginate(5);
            if($search = request()->search){
                $data = User::orderBy('created_at', 'DESC')->where('role','like','%'.$search.'%')->paginate(5);
            }
            return view('admin.users.supper_admin',compact('data','role'));
        }
        if(Auth::user()->role == User::ADMIN_ROLE){
            $role = User::SUPPER_ADMIN_ROLE;
            $data = User::whereNotIn('role',[$role])->paginate(5);
            if($search = request()->search){
                $data = User::whereNotIn('role',[$role])->where('role','like','%'.$search.'%')->paginate(5);
            }
            return view('admin.users.supper_admin',compact('data','role'));
        }

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
        return redirect()->route('admin.user.all-staff')->with('success','Add this account success');
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
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user.all-staff')->with('success','Delete this product success');
    }
}
