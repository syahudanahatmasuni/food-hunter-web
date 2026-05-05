<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>@yield('title')</title>

    @stack('prepend-style')
    @include('includes.auth.style')
    <!-- @stack('addon-style') -->
</head>

<body>
{{-- <body class="bg-login"> --}}
    @include('includes.auth.navbar')
    @yield('content')
    @include('includes.auth.footer')

    <!-- @stack('prepend-script') -->
    @include('includes.auth.script')
    @stack('addon-script')
</body>
</html>