@extends('admin.master')
@section('title', 'Add category')
@section('main')
<h1>Add Category</h1>
<form action="{{ route('admin.category.store') }}" method="POST" role='form'>
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
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Input your name category">
        @error('name')
        <small class="help-block">{{ $message }}</small>

        @enderror
    </div>
    <div class="form-group">
        <label for="">Status</label>
        <div class="radio">
            <label >
                <input type="radio" name="status" value="1" checked>public
            </label>
            <label >
                <input type="radio" name="status" value="0" checked>private
            </label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary">Save Data</button>
</form>


@stop
