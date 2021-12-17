@extends('admin.master')
@section('title', 'Dashboard')
@section('main')
    <h1>Hello {{ Auth::user()->name }}</h1>
@stop
