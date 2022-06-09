<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0,
          maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>laravel project</title>
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Urbanist:wght@300;400;600;700&display=swap"
        rel="stylesheet"
    />
    <link rel="stylesheet" href="/css/normalize.css" />
    <link rel="stylesheet" href="/css/styles.css" />
</head>
<body>
@include('_partials.header')

    @yield('show-collection')
    @yield('edit-collection')
    @yield('create-collection')

@include('_partials.footer')
<script src="/js/main.js"></script>
{{--<script src="{{ URL::asset('js/header.js') }}"></script>--}}
</body>
</html>

