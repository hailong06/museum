@extends('admin.master')
@section('title', 'Add ticket')
@section('main')
<h1>{{ __('messages.addTicket') }}</h1>
<form action="{{ route('admin.ticket.store') }}" method="POST" role='form'>
    @csrf
    <div class="form-group">
        <label for="">{{ __('messages.name') }}</label>
        <input type="text" class="form-control" name="name" placeholder="{{ __('messages.placeNameTicket') }}">
        @error('name')
            <small style="color:red" class="help-block">{{ $message }}</small>
        @enderror
    </div>
    <div class="form-group">
        <label for="">{{ __('messages.price') }}</label>
        <input type="number" class="form-control" name="price" placeholder="{{ __('messages.placePriceTicket') }}">
        @error('price')
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
    <div class="form-group">
        <label for="">{{ __('messages.description') }}</label>
        <textarea type="text" class="form-control" style="width: 100%;" rows="10" cols="130" name="description" placeholder="{{ __('messages.placeDesTicket') }}"></textarea>
        @error('description')
            <small style="color:red" class="help-block">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">{{ __('messages.saveData') }}</button>
</form>
<a href="{{ route('admin.ticket.home') }}">{{ __('messages.back') }}</a>

@stop
