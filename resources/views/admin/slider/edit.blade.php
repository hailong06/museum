@extends('admin.master')
@section('title', 'Edit Slider')
@section('main')
    <h1>Edit Slider</h1>
    <a href="{{ route('admin.slider.home') }}">Back</a>
    <form action="{{ route('admin.slider.update') }}" method="POST" enctype='multipart/form-data'>
        @csrf
        <input type="hidden" name="id" value="{{ $slider->id }}">
        <div class="form-group">
            <label for="">User_id</label>
            <select name="user_id" class="form-control">
                <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
            </select>
            @error('user_id')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" value="{{ $slider->name }}" class="form-control" name="name" placeholder="Input your title">
            @error('name')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Image</label>
            <input type="file" class="form-control-file" name="image">
            <img src="{{ asset('resources/admin/upload/blog/'.$slider->image) }}" height="180" width="300">
            @error('image')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <input type="text" value="{{ $slider->description }}" class="form-control" name="description" placeholder="Input your Information">
            @error('description')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="" >Status</label>
            <select name="status" class="custom-select">
                @if ($slider->status== 0)
                    <option selected value="0">private</option>
                    <option value="1">public</option>
                @else
                    <option selected value="1">public</option>
                    <option value="0">private</option>
                @endif
            </select>
        </div>
        <div class="form-group">
            <label for="">Link</label>
            <input type="text" value="{{ $slider->link }}" class="form-control" name="link" placeholder="Input your Link">
            @error('link')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save Blog</button>
    </form>
@stop
