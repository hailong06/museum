@extends('admin.master')
@section('title', 'Add ticket')
@section('main')
<h1>Add Ticket</h1>
<form action="{{ route('admin.ticket.store') }}" method="POST" role='form'>
    @csrf
    <div class="form-group">
        <label for="">Name</label>
        <input type="text" class="form-control" name="name" placeholder="Input your ticket name">
        @error('name')
            <small style="color:red" class="help-block">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Price</label>
        <input type="number" class="form-control" name="price" placeholder="Input your ticket price">
        @error('price')
            <small style="color:red" class="help-block">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Status</label>
        <div class="radio">
            <label >
                <input type="radio" name="status" value="1">public
            </label>
            <label >
                <input type="radio" name="status" value="0" checked>private
            </label>
        </div>
        @error('status')
            <small style="color:red" class="help-block">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Description</label>
        <textarea type="text" class="form-control" style="width: 100%;" rows="10" cols="130" name="description" placeholder="Input your ticket description"></textarea>
        @error('description')
            <small style="color:red" class="help-block">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Save Data</button>
</form>
<a href="{{ route('admin.ticket.home') }}">Back</a>

@stop
