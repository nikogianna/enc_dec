<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="shortcut icon" type="image/png" href="{{ asset('/favicon.png') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/gsap/1.12.1/TweenMax.min.js'></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/ama.css') }}" rel="stylesheet">

</head>

<body style="background-color: rgb(35,35,35);">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-dark navbar-laravel" style="background-color: rgb(200,0,0);">
            <a class="navbar-left" style="float: left" href="{{ url('http://www.scytale.ceid.upatras.gr/index.php/en/') }}">
                <img src="{{asset('/logo.png')}}" style="max-height: 150px; display: inline-block;">
            </a>
            <div class="container">
                <a class="navbar-brand button-text2" style="font-size: 2em !important;" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <footer class="footer" style="position: absolute;right: 0;bottom: 0;left: 0;padding: 1rem;background-color: rgb(200, 0, 0);text-align: center;">
      <div class="container">
        <span class="text-muted">Copyright © 2018 SCYTALE Group. All Rights Reserved.</span>
      </div>
    </footer>
</body>
</html>
