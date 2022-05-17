@extends('admin.master')
@section('title', 'Edit category')
@section('main')
    <h1>{{ __('messages.editDiscount') }}</h1>
    <form action="{{ route('admin.discount.update', $discount->id) }}" method="POST" role='form'>
        @csrf
        <div class="form-group">
            <label for="">{{ __('messages.code') }}</label>
            <input type="text" value="{{ $discount->code }}" class="form-control" name="code"
                placeholder="{{ __('messages.placeDisCode') }}">
            @error('code')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.condition') }}</label>
            <input type="text" class="form-control" value="{{ $discount->condition }}" name="condition" placeholder="{{ __('messages.placeDisCondi') }}">
            @error('condition')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.reduce') }}</label>
            <input type="text" class="form-control" value="{{ $discount->reduce }}" name="reduce" placeholder="{{ __('messages.placeDisReduce') }}">
            @error('reduce')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.start') }}</label>
            <input type="date" class="form-control" value="{{ $discount->start }}" name="start" placeholder="{{ __('messages.placeDisStart') }}">
            @error('start')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.end') }}</label>
            <input type="date" class="form-control" value="{{ $discount->end }}" name="end" placeholder="{{ __('messages.placeDisEnd') }}">
            @error('end')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.status') }}</label>
            <select name="status" class="custom-select">
                @if ($discount->status == 0)
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
    <a href="{{ route('admin.discount.home') }}">{{ __('messages.back') }}</a>
@stop
