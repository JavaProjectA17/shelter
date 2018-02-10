<!doctype html>
<html lang="ru">
    <head>
        <title>Pet Club</title>
        <meta charset="utf-8">
        <link rel="icon" href="/user/images/favicon.ico">
        <link rel="stylesheet" href="/user/css/style.css">
        <script src="/user/js/jquery.js"></script>

        @yield('links')
    </head>

    <body class="page1">
    @include('layouts.header')

        @yield('content')

    @include('layouts.footer')
    </body>
</html>