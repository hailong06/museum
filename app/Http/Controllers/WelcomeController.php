<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Banner;

class WelcomeController extends Controller
{
    public function index()
    {
        $slider = Banner::where('status',Banner::BANNER_PUBLIC)->get();
        $count_slider = Banner::where('status',Banner::BANNER_PUBLIC)->count();
        $data = Blog::orderBy('updated_at', 'DESC')
            ->where('status', BLog::BLOG_PUBLIC)->paginate(4);
        return view('user.home.welcome', compact('data', 'slider', 'count_slider'));
    }

}
