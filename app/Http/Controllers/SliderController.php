<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Banner;

class BlogController extends Controller
{
    public function index()
    {
        $data = Banner::all();
        // return view('user.layouts.header',compact('data'));
    }
}
