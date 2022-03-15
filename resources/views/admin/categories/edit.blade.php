@extends('admin.master')
@section('title', 'Edit category')
@section('main')
    <h1>Edit Category</h1>
    <form action="{{ route('admin.category.update', $category->id) }}" method="POST" role='form'>
        @csrf
        <div class="form-group">
            <label for="">Name</label>
            <input type="text" value="{{ $category->name }}" class="form-control" name="name"
                placeholder="Input your name cateogory">
            @error('name')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">Status</label>
            <select name="status" class="custom-select">
                @if ($category->status == 0)
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
    <a href="{{ route('admin.category.home') }}">Back</a>
@stop
