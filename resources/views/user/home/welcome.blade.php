@extends('user.museum')
@section('main')
    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">

            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                aria-current="true" aria-label="Slide 1"></button>
            @for ($i = 1; $i < $count_slider; $i++)
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="{{ $i }}"
                    aria-label="Slide 2"></button>
            @endfor
        </div>
        <div class="carousel-inner">
            @php $i = 1;@endphp
            @foreach ($slider as $sliders)
                <div class="carousel-item {{ $i == '1' ? 'active' : '' }}">
                    @php $i++;@endphp
                    <img src="{{ asset('resources/admin/upload/blog/' . $sliders->image) }}" alt="Display error"
                        width="100%" height="500">

                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    </header>
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="grid row row-cols-2 card1 ">
                <!-- Post preview-->
                @foreach ($data as $datas)
                    <div class="card g-col-6 ">
                        <img src="{{ asset('resources/admin/upload/blog/' . $datas->image) }}" height="300" width="600"
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <h4 class="card-title">{{ $datas->title }}</h4>
                            <h5 class="card-text">{{ $datas->sumary }}</h5><br>
                            <p class="form-card-css">{!! Str::limit($datas->content, 200) !!}</p>
                            <a href="{{ route('blog-detail', $datas->id) }}" class="btn btn-primary">{{ __('messages.read_more') }}</a>
                        </div>
                    </div>

                @endforeach
            </div>
            <div class="">
                {{ $data->appends(request()->all())->links() }}
            </div>
        </div>
    </div>

    <br>
@stop()
