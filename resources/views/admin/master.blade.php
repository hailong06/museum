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

            @yield('main')

@include('admin.layouts.footer')
@include('admin.layouts.script')

</body>
</html>
