<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script src="{{ mix('css/app.css') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div id="app" class="d-flex flex-nowrap">
        {{--SIDE NAV--}}
        <x-navigation.side-nav :category="$category" :subcategory="$subcategory" />
        
        <div class="flex-grow-1 d-flex flex-column">
            {{--TOP NAV--}}
            <x-navigation.top-nav :title="$title" />
            <main id="main" class="container-responsive overflow-auto">
                @yield('content')
            </main>
        </div>
    </div>
</body>
</html>
