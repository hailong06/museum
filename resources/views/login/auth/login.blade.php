@extends('login.master')
@section('title', 'Dashboard')
@section('main')
<form class="user" action="{{ route('login') }}" method="POST">
    @csrf
    <div class="form-group">
        <input name="email" type="email" class="form-control form-control-user"
            id="exampleInputEmail" aria-describedby="emailHelp"
            placeholder="{{ __('messages.loginEmail') }}">
            @error('email')
                <small class="help-block">{{ $message }}</small>
            @enderror
    </div>
    <div class="form-group">
        <input name="password" type="password" class="form-control form-control-user"
            id="exampleInputPassword" placeholder="{{ __('messages.loginPassword') }}">
            @error('password')
                <small class="help-block">{{ $message }}</small>
            @enderror
    </div>
    <div class="form-group">
        <div class="custom-control custom-checkbox small">
            <input name="remember_me" value="remember_me" type="checkbox" class="custom-control-input" id="customCheck">
            <label class="custom-control-label" for="customCheck">{{ __('messages.loginRemember') }}</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">{{ __('messages.login') }}</button>
    <hr>
</form>

@stop
