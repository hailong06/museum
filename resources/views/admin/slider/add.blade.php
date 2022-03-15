@extends('admin.master')
@section('title', 'Add slider')
@section('main')
    <h1>Add Slider</h1>
    <form action="{{ route('admin.slider.store') }}" method="POST" enctype='multipart/form-data'>
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Input your banner name">
            @error('name')
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
            <label for="">Description</label>
            <input type="text" class="form-control" name="description" placeholder="Input your slider description">
            @error('description')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="" >Status</label>
            <select name="status" class="custom-select">
                    <option value="0">private</option>
                    <option value="1">public</option>
            </select>
            @error('status')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Link</label>
            <input type="text" class="form-control" name="link" placeholder="Input your slider description">
            @error('link')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save slider</button>
    </form>
@stop
