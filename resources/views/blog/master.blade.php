<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Haris Shah - @yield('title')</title>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <script src="{{asset('js/app.js')}}"></script>
    @yield('css')
</head>

<body>

    @include('blog._partials.navbar')
    <div class="container-fluid">
        @yield('content')
    </div>

    @yield('js')
    @include('blog._partials.footer')
</body>

</html>
