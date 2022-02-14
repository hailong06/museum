<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Blog;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class BlogController extends Controller
{
    public function index()
    {
        $data = Blog::orderBy('created_at', 'DESC')->where('status',BLog::BLOG_PUBLIC)->paginate(3);
        $category = Category::where('status',Category::CATEGORY_PUBLIC)->paginate(1000000);
        if($search = request()->search){
            $data = Blog::orderBy('created_at', 'DESC')->where('title','like','%'.$search.'%')->paginate(3);
        }elseif($filter = request()->filter){
            $checked = $_GET['filter'];
            $data = Blog::whereIn('category_id',$checked)->where('status',BLog::BLOG_PUBLIC)->paginate(3);
        }
        return view('user.home.blog',compact('data','category'));
    }
    public function detail($id)
    {
        try{
            $category_id = Category::orderBy('id')->where('status',1)->get();
            $blog = Blog::findOrFail($id);
            return view('user.home.blog_detail',compact('blog','category_id'));
        }
        catch(ModelNotFoundException $err){
            return view('errors.404');
        }

    }
}
