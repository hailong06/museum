@extends('admin.master')
@section('title', 'Add BLog')
@section('main')
    <h1>Add Blog</h1>
    <form action="{{ route('admin.blog.store') }}" method="POST" enctype='multipart/form-data'>
        @csrf
        <div class="form-group">
            <label for="">User_id</label>
            <select name="user_id" class="form-control">
                <option value="{{ Auth::user()->id }}">{{ Auth::user()->name }}</option>
            </select>
            @error('user_id')
                <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Category_id</label>
            <select name="category_id" class="form-control">
                <option value="">Select one--</option>
                @foreach ($category_id as $categories)
                    <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Title</label>
            <input type="text" class="form-control" name="title" placeholder="Input your title">
            @error('title')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Image</label>
            <input type="file" class="form-control-file" name="image">
            @error('image')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Sumary</label>
            <input type="text" class="form-control" name="sumary" placeholder="Input your sumary">
            @error('sumary')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Content</label>
            <textarea name="content" id="area1" rows="10" cols="130" placeholder="Enter the content please"></textarea>
            @error('content')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="" >Status</label>
            <select name="status" class="custom-select">
                    <option value="0">private</option>
                    <option value="1">public</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save Blog</button>
    </form>
@stop
