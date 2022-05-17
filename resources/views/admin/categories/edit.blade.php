@extends('admin.master')
@section('title', 'Edit category')
@section('main')
    <h1>{{ __('messages.editCategory') }}</h1>
    <form action="{{ route('admin.category.update', $category->id) }}" method="POST" role='form'>
        @csrf
        <div class="form-group">
            <label for="">{{ __('messages.name') }}</label>
            <input type="text" value="{{ $category->name }}" class="form-control" name="name"
                placeholder="{{ __('messages.placeNameCategory') }}">
            @error('name')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.status') }}</label>
            <select name="status" class="custom-select">
                @if ($category->status == 0)
                    <option selected value="0">{{ __('messages.private') }}</option>
                    <option value="1">{{ __('messages.public') }}</option>
                @else
                    <option selected value="1">{{ __('messages.public') }}</option>
                    <option value="0">{{ __('messages.private') }}</option>
                @endif
            </select>
            @error('status')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">{{ __('messages.saveData') }}</button>
    </form>
    <a href="{{ route('admin.category.home') }}">{{ __('messages.back') }}</a>
@stop
