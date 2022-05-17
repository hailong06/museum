@extends('admin.master')
@section('title', 'Add category')
@section('main')
<h1>{{ __('messages.addCategory') }}</h1>
<form action="{{ route('admin.category.store') }}" method="POST" role='form'>
    @csrf
    <div class="form-group">
        <label for="">{{ __('messages.name') }}</label>
        <input type="text" class="form-control" name="name" placeholder="{{ __('messages.placeNameCategory') }}">
        @error('name')
            <small style="color:red" class="help-block">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">{{ __('messages.status') }}</label>
        <div class="radio">
            <label >
                <input type="radio" name="status" value="1">{{ __('messages.public') }}
            </label>
            <label >
                <input type="radio" name="status" value="0" checked>{{ __('messages.private') }}
            </label>
        </div>
        @error('status')
            <small style="color:red" class="help-block">{{ $message }}</small>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">{{ __('messages.saveData') }}</button>
</form>
<a href="{{ route('admin.category.home') }}">{{ __('messages.back') }}</a>

@stop
