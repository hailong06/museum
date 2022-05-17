@extends('admin.master')
@section('title', 'Add slider')
@section('main')
    <h1>{{ __('messages.addSlider') }}</h1>
    <form action="{{ route('admin.slider.store') }}" method="POST" enctype='multipart/form-data'>
        @csrf
        <div class="form-group">
            <label for="">{{ __('messages.name') }}</label>
            <input type="text" class="form-control" name="name" placeholder="{{ __("messages.placeSlider") }}">
            @error('name')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.imageBlog') }}</label>
            <input type="file" class="form-control-file" name="image">
            @error('image')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __("messages.description") }}</label>
            <input type="text" class="form-control" name="description" placeholder="{{ __('messages.placeDesSlider') }}">
            @error('description')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="" >{{ __("messages.status") }}</label>
            <select name="status" class="custom-select">
                    <option value="0">{{ __("messages.private") }}</option>
                    <option value="1">{{ __("messages.public") }}</option>
            </select>
            @error('status')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.link') }}</label>
            <input type="text" class="form-control" name="link" placeholder="{{ __('messages.placeLinkSlider') }}">
            @error('link')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">{{ __('messages.saveData') }}</button>
    </form>
@stop
