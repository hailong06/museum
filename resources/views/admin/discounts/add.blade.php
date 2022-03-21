@extends('admin.master')
@section('title', 'Add discount code')
@section('main')
<h1>Add Discount Code</h1>
<form action="{{ route('admin.discount.store') }}" method="POST" role='form'>
    @csrf
    <div class="form-group">
        <label for="">Code</label>
        <input type="text" class="form-control" name="code" placeholder="Input your code discount">
        @error('code')
            <small style="color:red" class="help-block">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Condition</label>
        <input type="text" class="form-control" name="condition" placeholder="Input your condition discount">
        @error('condition')
            <small style="color:red" class="help-block">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Reduce</label>
        <input type="text" class="form-control" name="reduce" placeholder="Input your reduce discount">
        @error('reduce')
            <small style="color:red" class="help-block">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">Start</label>
        <input type="date" class="form-control" name="start" placeholder="Input your start discount">
        @error('start')
            <small style="color:red" class="help-block">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">End</label>
        <input type="date" class="form-control" name="end" placeholder="Input your end code discount">
        @error('end')
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
    <button type="submit" class="btn btn-primary">Save Data</button>
</form>
<a href="{{ route('admin.discount.home') }}">Back</a>

@stop
