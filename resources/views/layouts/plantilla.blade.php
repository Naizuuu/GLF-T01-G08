<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico')}}" type="image/x-icon">
    <!-- stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css\bootstrap.min.css')}}">
    <style type="text/css">
        body {
            /* background-color: rgb(207, 208, 209); */
            padding-top: 4.5rem; 
        }
    </style>
</head>
<body>
    <!-- header -->
    <!-- nav -->
    @include('layouts.partials.nav')

    @yield('content')

    <!-- footer -->
    <!-- script -->
    <script src="{{ asset('js\jquery-3.5.1.slim.min.js')}}"></script>
    <script src="{{ asset('js\popper.min.js')}}"></script>
    <script src="{{ asset('js\bootstrap.min.js')}}"></script>
</body>
</html>