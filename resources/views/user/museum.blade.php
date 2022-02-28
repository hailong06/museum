<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <title>Bảo Tàng Mỹ Thuật Việt Nam</title>
    @include('user.layouts.style')
</head>

<body>
    <!-- Navigation-->
    @include('user.layouts.nav')
    <!-- Page Header-->
    @include('user.layouts.header')
    @yield('main')
    @include('user.layouts.footer')
    @include('user.layouts.script')
</body>

</html>
