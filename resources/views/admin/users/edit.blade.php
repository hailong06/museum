@extends('admin.master')
@section('title', 'Edit User')
@section('main')
    <h1>{{ __('messages.editUser') }}</h1>
    <form action="{{ route('admin.user.update', $user->id) }}" method="POST" role='form'>
        @csrf
        <div class="form-group">
            <label for="">{{ __('messages.name') }}</label>
            <input type="text" class="form-control" value="{{ $user->name }}" name="name" placeholder="{{ __('messages.placeNameUser') }}">
            @error('name')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.email') }}</label>
            <input type="text" class="form-control" value="{{ $user->email }}" name="email" placeholder="{{ __('messages.placeEmailUser') }}">
            @error('email')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.address') }}</label>
            <input type="text" class="form-control" value="{{ $user->address }}" name="address" placeholder="{{ __('messages.placeAddressUser') }}">
            @error('address')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.phone') }}</label>
            <input type="string" class="form-control" value="{{ $user->phone }}" name="phone" placeholder="{{ __('messages.placePhoneUser') }}">
            @error('phone')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.role') }}</label>
            <select name="role" class="form-control">
                @if ($user->role== 0)
                    <option selected value="0">{{ __('messages.useruser') }}</option>
                    <option value="1">{{ __('messages.superAdmin') }}</option>
                    <option value="2">{{ __('messages.admin') }}</option>
                    <option value="3">{{ __('messages.staff') }}</option>
                @elseif ($user->role== 1)
                    <option value="0">{{ __('messages.useruser') }}</option>
                    <option value="1" selected>{{ __('messages.superAdmin') }}</option>
                    <option value="2">{{ __('messages.admin') }}</option>
                    <option value="3">{{ __('messages.staff') }}</option>
                @elseif ($user->role== 2)
                    <option value="0">{{ __('messages.useruser') }}</option>
                    <option value="1">{{ __('messages.superAdmin') }}</option>
                    <option value="2" selected>{{ __('messages.admin') }}</option>
                    <option value="3">{{ __('messages.staff') }}</option>
                @elseif ($user->role== 3)
                    <option value="0">{{ __('messages.useruser') }}</option>
                    <option value="1">{{ __('messages.superAdmin') }}</option>
                    <option value="2">{{ __('messages.admin') }}</option>
                    <option value="3" selected>{{ __('messages.staff') }}</option>
                @endif
            </select>
            @error('role')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">{{ __('messages.saveData') }}</button>
    </form>


@stop
