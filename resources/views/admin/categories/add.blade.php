@extends('admin.master')
@section('title', 'Add category')
@section('main')
<h1>Add Category</h1>
<form action="{{ route('admin.category.store') }}" method="POST" role='form'>
    @csrf
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Input your name category">
        @error('name')
            <small style="color:red" class="help-block">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Status</label>
        <div class="radio">
            <label >
                <input type="radio" name="status" value="1">public
            </label>
            <label >
                <input type="radio" name="status" value="0" checked>private
            </label>
        </div>
        @error('status')
            <small style="color:red" class="help-block">{{ $message }}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Save Data</button>
</form>
<a href="{{ route('admin.category.home') }}">Back</a>

@stop
