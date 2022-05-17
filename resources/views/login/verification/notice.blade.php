@extends('login.master')

@section('content')
    <div class="bg-light p-5 rounded">
        <h1>{{ __('messages.login') }}</h1>

        @if (session('resent'))
            <div class="alert alert-success" role="alert">
                {{ __('messages.loginAlert1') }}
            </div>
        @endif

        {{ __('messages.loginAlert2') }}
        <form action="{{ route('verification.resend') }}" method="POST" class="d-inline">
            @csrf
            <button type="submit" class="d-inline btn btn-link p-0">
                {{ __('messages.loginAlert3') }}
            </button>.
        </form>
        <a href="{{ route('login') }}">{{ __('messages.backToLogin') }}</a>
    </div>
@endsection
