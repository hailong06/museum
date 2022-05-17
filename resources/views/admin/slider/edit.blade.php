@extends('admin.master')
@section('title', 'Edit Slider')
@section('main')
    <h1>{{ __('messages.editSlider') }}r</h1>
    <a href="{{ route('admin.slider.home') }}">{{ __('messages.back') }}</a>
    <form action="{{ route('admin.slider.update', $slider->id) }}" method="POST" enctype='multipart/form-data'>
        @csrf
        <div class="form-group">
            <label for="">{{ __('messages.name') }}</label>
            <input type="text" value="{{ $slider->name }}" class="form-control" name="name" placeholder="{{ __('messages.placeNameSlider') }}">
            @error('name')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.imageBlog') }}</label>
            <input type="file" class="form-control-file" name="image">
            <img src="{{ asset('resources/admin/upload/blog/'.$slider->image) }}" height="180" width="300">
            @error('image')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="">{{ __('messages.description') }}</label>
            <input type="text" value="{{ $slider->description }}" class="form-control" name="description" placeholder="{{ __('messages.placeDesSlider') }}">
            @error('description')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <div class="form-group">
            <label for="" >{{ __('messages.status') }}</label>
            <select name="status" class="custom-select">
                @if ($slider->status== 0)
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
            <label for="">{{ __('messages.link') }}</label>
            <input type="text" value="{{ $slider->link }}" class="form-control" name="link" placeholder="{{ __('messages.placeLinkSlider') }}">
            @error('link')
                <small style="color:red" class="help-block">{{ $message }}</small>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">{{ __('messages.saveData') }}</button>
    </form>
@stop
