<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Banner;
use App\Http\Requests\slider\StoreSliderRequest;
use App\Http\Requests\slider\UpdateSliderRequest;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Banner::orderBy('created_at', 'DESC')->paginate(5);
        if($search = request()->search){
            $data = Banner::orderBy('created_at', 'DESC')->where('title','like','%'.$search.'%')->paginate(5);
        }
        return view('admin.slider.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.slider.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSliderRequest $request)
    {
        $slider = new Banner();
        $slider->user_id = $request->user_id;
        $slider->name = $request->name;
        $slider->description = $request->description;
        $slider->status = $request->status;
        $slider->link = $request->link;
        $get_image = $request->image;
        $path = 'resources/admin/upload/blog/';
        $get_name_image = $get_image->getClientOriginalName();
        $name_image = current(explode('.', $get_name_image));
        $new_image = $name_image.rand(0,1000).'.'.$get_image->getClientOriginalExtension();
        $get_image->move($path, $new_image);

        $slider->image = $new_image;
        $slider->save();
        return redirect()->route('admin.slider.home')->with('success','Add this slider success');
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
        $slider = Banner::findOrFail($id);
        return view('admin.slider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSliderRequest $request,Banner $slider)
    {
        $slider = Banner::findOrFail($request->id);
        $slider->user_id = $request->user_id;
        $slider->name= $request->name;
        $slider->description = $request->description;
        $slider->status = $request->status;
        $slider->link = $request->link;
        $get_image = $request->image;
        if ($get_image) {
            $path = 'resources/admin/upload/blog/'.$slider->image;
            if(file_exists($path)){
                unlink($path);
            }
            $path = 'resources/admin/upload/blog/';
            $get_name_image = $get_image->getClientOriginalName();
            $name_image = current(explode('.', $get_name_image));
            $new_image = $name_image.rand(0, 1000).'.'.$get_image->getClientOriginalExtension();
            $get_image->move($path, $new_image);
            $slider->image = $new_image;
        }
        $slider->save();
        return redirect()->route('admin.slider.home')->with('success','Update this slider success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slider = Banner::findOrFail($id);
        $path = 'resources/admin/upload/blog/'.$slider->image;
        if(file_exists($path)){
            unlink($path);
        }
        $slider->delete();
        return redirect()->route('admin.slider.home')->with('success','Delete this product success');
    }
}
