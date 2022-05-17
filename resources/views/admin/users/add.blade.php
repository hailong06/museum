@extends('admin.master')
@section('title', 'Add User')
@section('main')
    <h1>{{ __('messages.addUser') }}</h1>
    <form action="{{ route('admin.user.store') }}" method="POST" role='form'>
        @csrf
        <div class="form-group">
            <label for="">{{ __('messages.name') }}</label>
            <input type="text" class="form-control" name="name" placeholder="{{ __('messages.placeNameUser') }}">
            @error('name')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.email') }}</label>
            <input type="text" class="form-control" name="email" placeholder="{{ __('messages.placeEmailUser') }}">
            @error('email')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.loginPassword') }}</label>
            <input type="password" class="form-control" name="password" placeholder="{{ __('messages.placePasswordUser') }}">
            @error('password')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.address') }}</label>
            <input type="text" class="form-control" name="address" placeholder="{{ __('messages.placeAddressUser') }}">
            @error('address')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.phone') }}</label>
            <input type="string" class="form-control" name="phone" placeholder="{{ __('messages.placePhoneUser') }}">
            @error('phone')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.role') }}</label>
            <select name="role" class="form-control">
                <option value="">{{ __('messages.selectOne') }}</option>
                <option value="0">{{ __('messages.useruser') }}</option>
                <option value="1">{{ __('messages.superAdmin') }}</option>
                <option value="2">{{ __('messages.admin') }}</option>
                <option value="3">{{ __('messages.staff') }}</option>
            </select>
            @error('role')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">{{ __('messages.saveData') }}</button>
    </form>


@stop
