@extends('admin.master')
@section('title', 'Edit BLog')
@section('main')
    <h1>Edit Blog</h1>
    <form action="{{ route('admin.blog.update') }}" method="POST" enctype='multipart/form-data'>
        @csrf
        <input type="hidden" name="id" value="{{ $blog->id }}">
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
                @foreach ($category_id as $category)
                    <option value="{{ $category->id }}" {{ $blog->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Title</label>
            <input type="text" value="{{ $blog->title }}" class="form-control" name="title" placeholder="Input your title">
            @error('title')
                <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Image</label>
            <input type="file" class="form-control-file" name="image">
            <img src="{{ asset('resources/admin/upload/blog/'.$blog->image) }}" height="180" width="300">
            @error('image')
                <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Sumary</label>
            <input type="text" value="{{ $blog->sumary }}" class="form-control" name="sumary" placeholder="Input your sumary">
            @error('sumary')
                <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Content</label>
            <textarea class="form-control" name="summernote" id="summernote">{{ $blog->content }}</textarea>
            @error('summernote')
                <small class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="" >Status</label>
            <select name="status" class="custom-select">
                @if ($blog->status== 0)
                    <option selected value="0">private</option>
                    <option value="1">public</option>
                @else
                    <option selected value="1">public</option>
                    <option value="0">private</option>
                @endif
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Save Blog</button>
    </form>
@stop
