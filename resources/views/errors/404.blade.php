@extends('user.museum')
@section('main')
<div class="container-fluid">

    <!-- 404 Error Text -->
    <div class="text-center">
        <div class="error mx-auto" data-text="404">404</div>
        <p class="lead text-gray-800 mb-5">Error</p>
        <p class="text-gray-500 mb-0">it's look like having some problem. Please click link below to back safe</p>
        <a href="{{ route('welcome') }}">&larr; Back to Home page</a>
    </div>

</div>
@stop
