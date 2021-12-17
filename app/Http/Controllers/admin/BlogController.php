<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Blog;
use App\Http\Requests\blog\StoreBLogRequest;
use App\Http\Requests\blog\UpdateBlogRequest;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request()->search;
        $data = Blog::orderBy('created_at', 'DESC')->where('title','like','%'.$search.'%')->paginate(5);
        return view('admin.blogs.index',compact('data','search'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id= User::orderBy('name','ASC')->select('id','name')->get();
        $category_id = Category::orderBy('name','ASC')->select('id','name')->get();
        return view('admin.blogs.add',compact('user_id','category_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogRequest $request)
    {
        $blog = new Blog();
        $blog->user_id = $request->user_id;
        $blog->category_id = $request->category_id;
        $blog->title = $request->title;
        $blog->sumary = $request->sumary;
        $blog->content = $request->content;
        $blog->status = $request->status;
        $get_image = $request->image;
        $path = 'resources/admin/upload/blog/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);

        $blog->image = $new_image;
        $blog->save();
        return redirect()->route('admin.blog.home')->with('success','Add this blog success');
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
        $user_id = User::orderBy('id')->get();
        $category_id = Category::orderBy('id')->get();
        $blog = Blog::findOrFail($id);
        return view('admin.blogs.edit',compact('user_id','category_id','blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogRequest $request, Blog $blog)
    {
        $blog = Blog::findOrFail($request->id);
        $blog->user_id = $request->user_id;
        $blog->category_id = $request->category_id;
        $blog->title = $request->title;
        $blog->sumary = $request->sumary;
        $blog->content = $request->content;
        $blog->status = $request->status;
        $get_image = $request->image;
        if ($get_image) {
            $path = 'resources/admin/upload/blog/'.$blog->image;
            if(file_exists($path)){
                unlink($path);
            }
            $path = 'resources/admin/upload/blog/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0, 99).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $blog->image = $new_image;
        }
        $blog->save();
        return redirect()->route('admin.blog.home')->with('success','Update this blog success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $path = 'resources/admin/upload/blog/'.$blog->image;
        if(file_exists($path)){
            unlink($path);
        }
        $blog->delete();
        return redirect()->route('admin.blog.home')->with('success','Delete this product success');
    }
}
