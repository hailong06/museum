@extends('login.master')
@section('title', 'Dashboard')
@section('main')
<form class="user" action="{{ route('login') }}" method="POST">
    @csrf
    <div class="form-group">
        <input name="email" type="email" class="form-control form-control-user"
            id="exampleInputEmail" aria-describedby="emailHelp"
            placeholder="Enter Email Address...">
            @error('email')
                <small class="help-block">{{ $message }}</small>
            @enderror
    </div>
    <div class="form-group">
        <input name="password" type="password" class="form-control form-control-user"
            id="exampleInputPassword" placeholder="Password">
            @error('password')
                <small class="help-block">{{ $message }}</small>
            @enderror
    </div>
    <div class="form-group">
        <div class="custom-control custom-checkbox small">
            <input name="remember_me" value="remember_me" type="checkbox" class="custom-control-input" id="customCheck">
            <label class="custom-control-label" for="customCheck">Remember Me</label>
        </div>
    </div>
    <button type="submit" class="btn btn-primary btn-user btn-block">Login</button>
    <hr>
    <a href="" class="btn btn-google btn-user btn-block">
        <i class="fab fa-google fa-fw"></i> Login with Google
    </a>
    <a href="" class="btn btn-facebook btn-user btn-block">
        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
    </a>
</form>

@stop
