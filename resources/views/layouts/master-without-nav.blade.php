<!doctype html>
<html lang="en" data-bs-theme="light" data-footer="dark">

<head>
    <meta charset="utf-8">
    <title>@yield('title') | Dasein</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Dasein" name="description">
    <meta content="Dasein" name="rashad-khan">
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ URL::asset('build/images/favicon.ico') }}">

    <!-- head css -->
    @include('layouts.head-css')
</head>

<body>

    @yield('content')

</body>

</html>
