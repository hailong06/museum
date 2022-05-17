@extends('admin.master')
@section('title', 'Edit BLog')
@section('main')
    <h1>{{ __('messages.editBLog') }}</h1>
    <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype='multipart/form-data'>
        @csrf
        <div class="form-group">
            <label for="">{{ __('messages.category') }}</label>
            <select name="category_id" class="form-control">
                @foreach ($category_id as $category)
                    <option value="{{ $category->id }}" {{ $blog->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.title') }}</label>
            <input type="text" value="{{ $blog->title }}" class="form-control" name="title" placeholder="{{ __('messages.placeTitleBlog') }}">
            @error('title')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.imageBlog') }}</label>
            <input type="file" class="form-control-file" name="image">
            <img src="{{ asset('resources/admin/upload/blog/'.$blog->image) }}" height="180" width="300">
            @error('image')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.sumary') }}</label>
            <input type="text" value="{{ $blog->sumary }}" class="form-control" name="sumary" placeholder="{{ __('messages.placeSumaryBlog') }}">
            @error('sumary')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.content') }}</label>
            <textarea name="content" class="form-control my-editor" id="area1" rows="10" cols="130">{{ $blog->content }}</textarea>
            @error('content')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="" >{{ __('messages.status') }}</label>
            <select name="status" class="custom-select">
                @if ($blog->status== 0)
                    <option selected value="0">{{ __('messages.private') }}</option>
                    <option value="1">{{ __('messages.public') }}</option>
                @else
                    <option selected value="1">{{ __('messages.public') }}</option>
                    <option value="0">{{ __('messages.private') }}</option>
                @endif
            </select>
            @error('status')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">{{ __('messages.saveBlog') }}</button>
    </form>
    <br>
    <a href="{{ route('admin.blog.home') }}">{{ __('messages.back') }}</a>
    <hr>
@stop
