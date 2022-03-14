@extends('admin.master')
@section('title', 'Add category')
@section('main')
    <h1>Add</h1>
    <form action="{{ route('admin.user.store') }}" method="POST" role='form'>
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Input your name">
            @error('name')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Input your email ">
            @error('email')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Password</label>
            <input type="password" class="form-control" name="password" placeholder="Input your password">
            @error('password')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Address</label>
            <input type="text" class="form-control" name="address" placeholder="Input your address">
            @error('address')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Phone</label>
            <input type="string" class="form-control" name="phone" placeholder="Input your phone">
            @error('phone')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Role</label>
            <select name="role" class="form-control">
                <option value="">Select one--</option>
                <option value="0">User</option>
                <option value="1">Supper Admin</option>
                <option value="2">Admin</option>
                <option value="3">Staff</option>
            </select>
            @error('role')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save Data</button>
    </form>


@stop
