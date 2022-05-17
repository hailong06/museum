@extends('admin.master')
@section('title', 'Add discount code')
@section('main')
<h1>{{ __('messages.addDiscount') }}</h1>
<form action="{{ route('admin.discount.store') }}" method="POST" role='form'>
    @csrf
    <div class="form-group">
        <label for="">{{ __('messages.code') }}</label>
        <input type="text" class="form-control" name="code" placeholder="{{ __('messages.placeDisCode') }}">
        @error('code')
            <small style="color:red" class="help-block">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">{{ __('messages.condition') }}</label>
        <input type="text" class="form-control" name="condition" placeholder="{{ __('messages.placeDisCondi') }}">
        @error('condition')
            <small style="color:red" class="help-block">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">{{ __('messages.reduce') }}</label>
        <input type="text" class="form-control" name="reduce" placeholder="{{ __('messages.placeDisReduce') }}">
        @error('reduce')
            <small style="color:red" class="help-block">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">{{ __('messages.start') }}</label>
        <input type="date" class="form-control" name="start" placeholder="{{ __('messages.placeDisStart') }}">
        @error('start')
            <small style="color:red" class="help-block">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">{{ __('messages.end') }}</label>
        <input type="date" class="form-control" name="end" placeholder="{{ __('messages.placeDisEnd') }}">
        @error('end')
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
<a href="{{ route('admin.discount.home') }}">{{ __('messages.back') }}</a>

@stop
