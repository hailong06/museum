@extends('admin.master')
@section('title', 'Edit category')
@section('main')
    <h1>Edit Category</h1>
    <form action="{{ route('admin.discount.update', $discount->id) }}" method="POST" role='form'>
        @csrf
        <div class="form-group">
            <label for="">Code</label>
            <input type="text" value="{{ $discount->code }}" class="form-control" name="code"
                placeholder="Input your code discount">
            @error('code')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Condition</label>
            <input type="text" class="form-control" value="{{ $discount->condition }}" name="condition" placeholder="Input your condition discount">
            @error('condition')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Reduce</label>
            <input type="text" class="form-control" value="{{ $discount->reduce }}" name="reduce" placeholder="Input your reduce discount">
            @error('reduce')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Start</label>
            <input type="date" class="form-control" value="{{ $discount->start }}" name="start" placeholder="Input your start discount">
            @error('start')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">End</label>
            <input type="date" class="form-control" value="{{ $discount->end }}" name="end" placeholder="Input your end code discount">
            @error('end')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Status</label>
            <select name="status" class="custom-select">
                @if ($discount->status == 0)
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
        <button type="submit" class="btn btn-primary">Save Data</button>
    </form>
    <a href="{{ route('admin.discount.home') }}">Back</a>
@stop
