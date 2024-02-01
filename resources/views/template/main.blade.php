<!doctype html>
<html lang="pt">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf" content="{{ csrf_token() }}">

    <title>{{config('app.name')}} @hasSection('title')
            :: @yield('title')
        @endif</title>

    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/72c4a6b265.js" crossorigin="anonymous"></script>

</head>
<body>

<div class="container vh-100 bg-light border-1 border-start border-end pt-3">

    @include('parts.login-bar')

    <div class="text-center pt-5 pb-5">
        <img class="mw-100" src="{{asset('assets/images/logo.png')}}"/>
    </div>

    <div class="border-top p-1 p-md-5">
        @yield('main')
    </div>

</div>


@vite('resources/js/app.js')
@stack('scripts')
@include('parts.general-alerts')
</body>
</html>
