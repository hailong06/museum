@extends('user.museum')
@section('main')
</header>
    @csrf
    <div class="container">
        <div class="form-group"><h1 align='center'>{{ $blog->title }}</h1></div>
        <p></p>
        <div class="form-group" align='center'>
        <img src="{{ asset('resources/admin/upload/blog/'.$blog->image) }}" height="500" width="600">
        </div>
        <p></p>
        <p></p>
        <div class="form-group"><h3>{{ $blog->sumary }}</h3></div>
        <div class="form-group">{!! $blog->content !!}</div>
        <div class="form-group"><h6>{{ Auth::user()->name }}</h6><h6>{{ $blog->created_at }}</h6></div>
        <hr class="my-4" />
    </div>
@stop()
