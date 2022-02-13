<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class WelcomeController extends Controller
{

    public function index()
    {
        $data = Blog::orderBy('updated_at', 'DESC')->paginate(5);
        if($search = request()->search){
            $data = Blog::orderBy('updated_at', 'DESC')->where('title','like','%'.$search.'%')->paginate(5);
        }
        return view('user.home.welcome',compact('data'));
    }

}
