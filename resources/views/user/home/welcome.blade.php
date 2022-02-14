@extends('user.museum')
@section('main')
    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Post preview-->
                @foreach ($data as $datas)
                    <div class="post-preview">
                        <h2 class="post-title">{{ $datas->title }}</h2>
                        <h4 class="post-subtitle">{{ $datas->sumary }}</h4>
                        <p class="post-meta">
                            Posted by on {{ $datas->updated_at }}
                        </p>
                    </div>
                    <a href="{{ route('blog-detail', $datas->id) }}">Read more</a>
                    <hr class="my-4" />
                @endforeach
                <div class="">
                    {{ $data->appends(request()->all())->links() }}
                </div>
            </div>
        </div>
    </div>

@stop()
