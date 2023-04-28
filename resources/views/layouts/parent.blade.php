<!DOCTYPE HTML>
<html lang = "ja">
    <head>
        <meta charset = "UTF-8">
        <title>@yield('title')</title>
        <link rel = "stylesheet" href = "https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    </head>
    <body>
        @include('layouts.header')
        @if (session('flash_message'))
            <div class="flash_message bg-success text-center py-3 my-0">
                {{ session('flash_message') }}
            </div>
        @endif
        @if (session('flash_delete'))
            <div class = "flash_message bg-danger text-center py-3 my-0">
                {{ session('flash_delete') }}
            </div>
        @endif
        @yield('content')
    </body>
</html>
