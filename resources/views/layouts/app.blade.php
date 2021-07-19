<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Feather -->
    <script src="https://unpkg.com/feather-icons"></script>

    @yield('header_script')

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app" class="@yield('app_style')">
        <div id="root" class="container">
            <div class="row">
                <!-- Inizio Sezione Verticale -->
                <div class="col-1 vertical-nav">
                    @yield('vertical-nav')
                </div>
                <!-- Fine Sezione Verticale -->

                <!-- Inizio App Content -->
                <!-- ATTENZIONE: Mentre si struttura il carrello metti col-8 -->
                <div class="app-content" :class="openBasket ? 'col-8' : 'col-11'">
                    @yield('content')
                </div>
                <!-- Fine App Content -->

                <!-- Inizio Finestra Laterale -->
                <!-- ATTENZIONE: Mentre si struttura il carrello metti col-3 -->
                <div class="side-window" :class="openBasket ? 'col-3' : ''">
                    @yield('side-window')
                </div>
                <!-- Fine Finestra Laterale -->
            </div>
        </div>
    </div>
    @yield('footer_script')
</body>
</html>
