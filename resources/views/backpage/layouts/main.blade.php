<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <link rel="shortcut icon" href="./img/fav.png" type="image/x-icon">   --}}
    <link rel="icon" href="{{ asset('frontpage/assets/icons/icon_web_wefgis.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://kit-pro.fontawesome.com/releases/v5.12.1/css/pro.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('backpage/css/style.css') }}">
    <title>Admin | WefGIS</title>


    <!-- css leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- jquery CDN-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- leaflet draw CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" />
    <!-- SAEARCH GEOCODER CSS-->
    <link rel="stylesheet" href="{{ asset('frontpage/assets/css-leaflet/leaflet-control-geocoder.Geocoder.css') }}">
    <!-- icon awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    @stack('addon-style')
</head>

<body class="bg-gray-100">
    @include('backpage.layouts.navbar')

    <!-- strat wrapper -->
    <div class="h-screen flex flex-row flex-wrap">

        @include('backpage.layouts.sidebar')

        {{-- content --}}
        @yield('content')


    </div>

    @yield('modal')

    <!-- end wrapper -->
    <!-- script -->
    <script src="{{ asset('backpage/js/scripts.js') }}"></script>
    @stack('addon-script')
</body>

</html>
