@extends('user.museum')
@section('main')

    <!-- Main Content-->
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <!-- Page content-->
                <div class="container">
                    <div class="row">
                        <!-- Blog entries-->
                        <div class="col-lg-8">
                            @foreach ($data as $blogs)
                                <div class="card mb-4">
                                    <a href="#!"><img class="card-img-top"
                                            src="{{ asset('resources/admin/upload/blog/' . $blogs->image) }}" height="300"
                                            width="350" alt="Blog image" /></a>
                                    <div class="card-body">
                                        <div class="small text-muted">{{ $blogs->updated_at }}</div>
                                        <h2 class="card-title">{{ $blogs->title }}</h2>
                                        <p class="card-text">{{ $blogs->sumary }}</p>
                                        <a class="btn btn-primary" href="#!">Read more →</a>
                                    </div>
                                </div>
                            @endforeach
                            <p></p>
                            <div class="">
                                {{ $data->appends(request()->all())->links() }}
                            </div>
                        </div>
                        <!-- Side widgets-->
                        <div class="col-lg-4">
                            <!-- Search widget-->
                            <form action="" method="get" class="form-inline">
                                <div class="form-group">
                                    <input class="form-control" name="search" placeholder="Search">
                                </div>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-search"></i>
                                </button>
                            </form>
                            <p></p>
                            <hr class="my-4" />
                            <!-- Categories widget-->
                            <form action="{{ route('blog') }}" method="get" class="form-inline">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <h5>Categories</h5>
                                        <button type="submit" class="btn btn-primary float-right">Filter</button>
                                    </div>
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-10">
                                                <ul class="list-unstyled mb-0">
                                                    @foreach ($category as $cate)
                                                    @php
                                                        $checked = [];
                                                        if(isset($_GET['filter'])){
                                                            $checked = $_GET['filter'];
                                                        }
                                                    @endphp
                                                        <li><input type="checkbox" name="filter[]" value="{{ $cate->id }}"
                                                            @if (in_array($cate->id, $checked))
                                                                checked
                                                            @endif>
                                                            {{ $cate->name }}
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <hr class="my-4" />
            </div>
        </div>
    </div>

@stop()

