@extends('admin.master')
@section('title', 'Edit User')
@section('main')
    <h1>Edit User</h1>
    <form action="{{ route('admin.user.update', $user->id) }}" method="POST" role='form'>
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" class="form-control" value="{{ $user->name }}" name="name" placeholder="Input your name">
            @error('name')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" value="{{ $user->email }}" name="email" placeholder="Input your email ">
            @error('email')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Address</label>
            <input type="text" class="form-control" value="{{ $user->address }}" name="address" placeholder="Input your address">
            @error('address')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Phone</label>
            <input type="string" class="form-control" value="{{ $user->phone }}" name="phone" placeholder="Input your phone">
            @error('phone')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Role</label>
            <select name="role" class="form-control">
                @if ($user->role== 0)
                    <option selected value="0">User</option>
                    <option value="1">Supper Admin</option>
                    <option value="2">Admin</option>
                    <option value="3">Staff</option>
                @elseif ($user->role== 1)
                    <option value="0">User</option>
                    <option value="1" selected>Supper Admin</option>
                    <option value="2">Admin</option>
                    <option value="3">Staff</option>
                @elseif ($user->role== 2)
                    <option value="0">User</option>
                    <option value="1">Supper Admin</option>
                    <option value="2" selected>Admin</option>
                    <option value="3">Staff</option>
                @elseif ($user->role== 3)
                    <option value="0">User</option>
                    <option value="1">Supper Admin</option>
                    <option value="2">Admin</option>
                    <option value="3" selected>Staff</option>
                @endif
            </select>
            @error('role')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Update Data</button>
    </form>


@stop
