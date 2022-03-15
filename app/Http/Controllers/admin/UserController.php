<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\user\StoreRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Auth;

/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 *
 */

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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == User::SUPPER_ADMIN_ROLE) {
            $role_super = User::SUPPER_ADMIN_ROLE;
            $data = User::orderBy('created_at', 'DESC')
                ->where('role', User::USER_ROLE)
                ->paginate(5);
            $count_data = User::orderBy('created_at', 'DESC')
                ->where('role', User::USER_ROLE)->count();
            return view('admin.users.supper_admin', compact('data', 'role_super', 'count_data'));
        }
        if (Auth::user()->role == User::ADMIN_ROLE) {
            $role_super = User::SUPPER_ADMIN_ROLE;
            $data = User::whereNotIn('role', [$role_super])
                ->where('role', User::USER_ROLE)
                ->paginate(5);
            $count_data = User::whereNotIn('role', [$role_super])
                ->where('role', User::USER_ROLE)->count();
            // if ($search = request()->search) {
            // $data = User::whereNotIn('role', [$role])
            //         ->where('name', 'like', '%'.$search.'%')
            //         ->where('role',User::USER_ROLE)
            //         ->paginate(5);
            // $count_data = $data->count();
            // }
            return view('admin.users.supper_admin', compact('data', 'role_super', 'count_data'));
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
        $data = $request->all();
        $output = '';
        $role_super = User::SUPPER_ADMIN_ROLE;
        if (Auth::user()->role == User::SUPPER_ADMIN_ROLE) {
            if ($data['user'] == 0 && $data['search'] == null) {
                $data = User::orderBy('created_at', 'DESC')
                    ->where('role', User::USER_ROLE)
                    ->get();
                $count_data = $data->count();
                if ($count_data > 0) {
                    $output = view('admin.output.output_user', compact('data', 'count_data', 'role_super'))->render();
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
            } elseif ($data['user'] == 0 && $data['search'] != null) {
                $data = User::orderBy('created_at', 'DESC')
                    ->where('role', User::USER_ROLE)
                    ->where('name', 'like','%'.$data['search'].'%')
                    ->get();
                $count_data = $data->count();
                if ($count_data > 0) {
                    $output = view('admin.output.output_user', compact('data', 'count_data', 'role_super'))->render();
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
            } elseif ($data['user'] == 1 && $data['search'] == null) {
                $data = User::orderBy('created_at', 'DESC')
                    ->where('role', User::SUPPER_ADMIN_ROLE)
                    ->get();
                $count_data = $data->count();
                if ($count_data > 0) {
                    $output = view('admin.output.output_user', compact('data', 'count_data', 'role_super'))->render();
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
            } elseif ($data['user'] == 1 && $data['search'] != null) {
                $data = User::orderBy('created_at', 'DESC')
                    ->where('role', User::SUPPER_ADMIN_ROLE)
                    ->where('name', 'like', '%'.$data['search'].'%')
                    ->get();
                $count_data = $data->count();
                if ($count_data > 0) {
                    $output = view('admin.output.output_user', compact('data', 'count_data', 'role_super'))->render();
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
            } elseif ($data['user'] == 2 && $data['search'] == null) {
                $data = User::orderBy('created_at', 'DESC')
                    ->where('role', User::ADMIN_ROLE)
                    ->get();
                $count_data = $data->count();
                if ($count_data > 0) {
                    $output = view('admin.output.output_user', compact('data', 'count_data', 'role_super'))->render();
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
            } elseif ($data['user'] == 2 && $data['search'] != null) {
                $data = User::orderBy('created_at', 'DESC')
                    ->where('role', User::ADMIN_ROLE)
                    ->where('name', 'like', '%'.$data['search'].'%')
                    ->get();
                $count_data = $data->count();
                if ($count_data > 0) {
                    $output = view('admin.output.output_user', compact('data', 'count_data', 'role_super'))->render();
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
            } elseif ($data['user'] == 3 && $data['search'] != null) {
                $data = User::orderBy('created_at', 'DESC')
                    ->where('role', User::STAFF_ROLE)
                    ->where('name', 'like', '%'.$data['search'].'%')
                    ->get();
                $count_data = $data->count();
                if ($count_data > 0) {
                    $output = view('admin.output.output_user', compact('data', 'count_data', 'role_super'))->render();
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
            } elseif ($data['user'] == 3 && $data['search'] == null) {
                $data = User::orderBy('created_at', 'DESC')
                    ->where('role', User::STAFF_ROLE)
                    ->get();
                $count_data = $data->count();
                if ($count_data > 0) {
                    $output = view('admin.output.output_user', compact('data', 'count_data', 'role_super'))->render();
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
        }else if (Auth::user()->role == User::ADMIN_ROLE) {
            if ($data['user'] == 0 && $data['search'] == null) {
                $data = User::orderBy('created_at', 'DESC')
                    ->where('role', User::USER_ROLE)
                    ->get();
                $count_data = $data->count();
                if ($count_data > 0) {
                    $output = view('admin.output.output_user', compact('data', 'count_data', 'role_super'))->render();
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
            } elseif ($data['user'] == 0 && $data['search'] != null) {
                $data = User::orderBy('created_at', 'DESC')
                    ->where('role', User::USER_ROLE)
                    ->where('name', 'like','%'.$data['search'].'%')
                    ->get();
                $count_data = $data->count();
                if ($count_data > 0) {
                    $output = view('admin.output.output_user', compact('data', 'count_data', 'role_super'))->render();
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
            // } elseif ($data['user'] == 1 && $data['search'] == null) {
            //     $data = User::orderBy('created_at', 'DESC')
            //         ->where('role', User::SUPPER_ADMIN_ROLE)
            //         ->get();
            //     $count_data = $data->count();
            //     if ($count_data > 0) {
            //         $output = view('admin.output.output_user', compact('data', 'count_data', 'role_super'))->render();
            //     } else {
            //         $output = '
            //     <tr>
            //         <td align="center" colspan="12">No Data Found</td>
            //     </tr>
            //     ';
            //     }
            //     $array = [
            //         'data' => $output,
            //         'count_data' => $count_data,
            //     ];
            //     return response()->json($array);
            // } elseif ($data['user'] == 1 && $data['search'] != null) {
            //     $data = User::orderBy('created_at', 'DESC')
            //         ->where('role', User::SUPPER_ADMIN_ROLE)
            //         ->where('name', 'like', '%'.$data['search'].'%')
            //         ->get();
            //     $count_data = $data->count();
            //     if ($count_data > 0) {
            //         $output = view('admin.output.output_user', compact('data', 'count_data', 'role_super'))->render();
            //     } else {
            //         $output = '
            //     <tr>
            //         <td align="center" colspan="12">No Data Found</td>
            //     </tr>
            //     ';
            //     }
            //     $array = [
            //         'data' => $output,
            //         'count_data' => $count_data,
            //     ];
            //     return response()->json($array);
            } elseif ($data['user'] == 2 && $data['search'] == null) {
                $data = User::orderBy('created_at', 'DESC')
                    ->where('role', User::ADMIN_ROLE)
                    ->get();
                $count_data = $data->count();
                if ($count_data > 0) {
                    $output = view('admin.output.output_user', compact('data', 'count_data', 'role_super'))->render();
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
            } elseif ($data['user'] == 2 && $data['search'] != null) {
                $data = User::orderBy('created_at', 'DESC')
                    ->where('role', User::ADMIN_ROLE)
                    ->where('name', 'like', '%'.$data['search'].'%')
                    ->get();
                $count_data = $data->count();
                if ($count_data > 0) {
                    $output = view('admin.output.output_user', compact('data', 'count_data', 'role_super'))->render();
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
            } elseif ($data['user'] == 3 && $data['search'] != null) {
                $data = User::orderBy('created_at', 'DESC')
                    ->where('role', User::STAFF_ROLE)
                    ->where('name', 'like', '%'.$data['search'].'%')
                    ->get();
                $count_data = $data->count();
                if ($count_data > 0) {
                    $output = view('admin.output.output_user', compact('data', 'count_data', 'role_super'))->render();
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
            } elseif ($data['user'] == 3 && $data['search'] == null) {
                $data = User::orderBy('created_at', 'DESC')
                    ->where('role', User::STAFF_ROLE)
                    ->get();
                $count_data = $data->count();
                if ($count_data > 0) {
                    $output = view('admin.output.output_user', compact('data', 'count_data', 'role_super'))->render();
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
            } else {
                $output = '
                <tr>
                    <td align="center" colspan="12">No Data Found</td>
                </tr>
                ';
                }
                $array = [
                    'data' => $output,
                ];
                return response()->json($array);
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
     * Display a listing of the resource.
     *
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
        return
            redirect()->route('admin.user.all-staff')
            ->with('success', 'Add this account success');
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
        return redirect()->route('admin.user.all-staff')
            ->with('success', 'Delete this product success');
    }
}
