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
    <div id="app" class="d-flex flex-column">
        <header class="d-flex justify-content-center flex-column">
            <x-website.navigation.navbar :category="$category" :subcategory="$subcategory" />
        </header>
        
        <main class="d-flex flex-column flex-grow-1">
            
            @yield('content')
    
            <footer>
                <x-website.footer :zoo="$zoo" />
            </footer>
        </main>
    </div>
</body>
</html>
