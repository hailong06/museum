<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title> Admin</title>
    <!-- Custom fonts for this template-->
    @include('admin.layouts.style')
</head>

<body id="page-top">

    @include('admin.layouts.header')
    @if (Session::has('error'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ Session::get('error') }}
        </div>
    @endif

    @if (Session::has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            {{ Session::get('success') }}
        </div>
    @endif
    @yield('main')

    @include('admin.layouts.footer')
    @include('admin.layouts.script')

</body>

</html>
