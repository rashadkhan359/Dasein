<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" data-bs-theme="light" data-footer="dark">

<head>
    <meta charset="utf-8">
    <title>@yield('title') | Dasein</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Dasein" name="description">
    <meta content="Dasein" name="rashad-khan">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('build/images/favicon.ico') }}">

    <!-- head css -->
    @include('layouts.head-css')
</head>

<body>

    <!-- top tagbar -->
    @include('layouts.top-tagbar')
    <!-- topbar -->
    @include('layouts.topbar')

    @yield('content')

    <!-- footer -->
    @include('layouts.footer')
    <!-- scripts -->
    @include('layouts.vendor-scripts')

</body>

</html>
