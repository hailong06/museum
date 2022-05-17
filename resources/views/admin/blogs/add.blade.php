@extends('admin.master')
@section('title', 'Add BLog')
@section('main')
    <h1>{{ __('messages.title') }}</h1>
    <form action="{{ route('admin.blog.store') }}" method="POST" enctype='multipart/form-data'>
        @csrf
        <div class="form-group">
            <label for="">{{ __('messages.category') }}</label>
            <select name="category_id" class="form-control">
                <option value="">{{ __('messages.selectOne') }}</option>
                @foreach ($category_id as $categories)
                    <option value="{{ $categories->id }}">{{ $categories->name }}</option>
                @endforeach
            </select>
            @error('category_id')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.title') }}</label>
            <input type="text" class="form-control" name="title" placeholder="{{ __('messages.placeTitleBlog') }}">
            @error('title')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.imageBlog') }}</label>
            <input type="file" class="form-control-file" name="image">
            @error('image')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.sumary') }}</label>
            <input type="text" class="form-control" name="sumary" placeholder="{{ __('messages.placeSumaryBlog') }}">
            @error('sumary')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.content') }}</label>
            <textarea name="content" class="form-control my-editor" style="width: 100%;" rows="10" cols="130" placeholder="{{ __('messages.placeContentBlog') }}"></textarea>
            @error('content')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="" >{{ __('messages.status') }}</label>
            <select name="status" class="custom-select">
                    <option value="0">{{ __('messages.private') }}</option>
                    <option value="1">{{ __('messages.public') }}</option>
            </select>
            @error('status')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">{{ __('messages.saveData') }}</button>
    </form>
@stop
