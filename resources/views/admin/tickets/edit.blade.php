@extends('admin.master')
@section('title', 'Edit Ticket')
@section('main')
    <h1>Edit Ticket</h1>
    <form action="{{ route('admin.ticket.update', $ticket->id) }}" method="POST" role='form'>
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" value="{{ $ticket->name }}" class="form-control" name="name"
                placeholder="Input your name cateogory">
            @error('name')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Price</label>
            <input type="number" value="{{ $ticket->price }}" class="form-control" name="price"
                placeholder="Input your ticket price">
            @error('price')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Status</label>
            <select name="status" class="custom-select">
                @if ($ticket->status == 0)
                    <option selected value="0">private</option>
                    <option value="1">public</option>
                @else
                    <option selected value="1">public</option>
                    <option value="0">private</option>
                @endif
            </select>
            @error('status')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Description</label>
            <textarea type="text" class="form-control" style="width: 100%;" rows="10" cols="130"
                name="description" placeholder="Input your ticket description">{{ $ticket->description }}</textarea>
                @error('description')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save Data</button>
    </form>
    <a href="{{ route('admin.ticket.home') }}">Back</a>
@stop
