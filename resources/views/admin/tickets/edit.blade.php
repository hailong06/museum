@extends('admin.master')
@section('title', 'Edit Ticket')
@section('main')
    <h1>{{ __('messages.editTicket') }}</h1>
    <form action="{{ route('admin.ticket.update', $ticket->id) }}" method="POST" role='form'>
        @csrf
        <div class="form-group">
            <label for="">{{ __('messages.name') }}</label>
            <input type="text" value="{{ $ticket->name }}" class="form-control" name="name"
                placeholder="{{ __('messages.placeNameTicket') }}">
            @error('name')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.price') }}</label>
            <input type="number" value="{{ $ticket->price }}" class="form-control" name="price"
                placeholder="{{ __('messages.placePriceTicket') }}">
            @error('price')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.status') }}</label>
            <select name="status" class="custom-select">
                @if ($ticket->status == 0)
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
        <div class="form-group">
            <label for="">{{ __('messages.description') }}</label>
            <textarea type="text" class="form-control" style="width: 100%;" rows="10" cols="130"
                name="description" placeholder="{{ __('messages.placeDesTicket') }}">{{ $ticket->description }}</textarea>
                @error('description')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">{{ __('messages.saveData') }}</button>
    </form>
    <a href="{{ route('admin.ticket.home') }}">{{ __('messages.back') }}</a>
@stop
