<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Geographic Information System</title>
    <link rel="icon" href="{{ asset('frontpage/assets/icons/icon_web_wefgis.ico') }}" type="image/x-icon">
    <!-- css bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <!-- css leaflet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />
    <!-- icon awesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- SAEARCH GEOCODER CSS-->
    <link rel="stylesheet" href="{{ asset('frontpage/assets/css-leaflet/leaflet-control-geocoder.Geocoder.css') }}">
    <!-- NAVIGASI BAR CSS-->
    <link rel="stylesheet" href="{{ asset('frontpage/assets/css-leaflet/Leaflet.NavBar.css') }}">
    <!-- MAIN STYLE CSS-->
    <link rel="stylesheet" href="{{ asset('frontpage/css/main.css') }}">
    <!-- sidebar custom css -->
    <link rel="stylesheet" href="{{ asset('frontpage/css/sidebar.css') }}">
    <!-- jquery CDN-->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"
        integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <!-- chart JS-->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <!-- leaflet draw CSS-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.css" />
</head>

<body>
    @include('frontpage.layouts.navbar')
    @include('frontpage.layouts.sidebar')

    @yield('content')

</body>
<!-- js bootstrap -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<!-- Leaflet CDN JS -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
<!-- SEEARCH FEATURE with GeoCoder -->
<script src="{{ asset('frontpage/assets/js-leaflet/leaflet-control-geocoder.Geocoder.js') }}"></script>
<!-- HASH IN URL -->
<script src="{{ asset('frontpage/assets/js-leaflet/leaflet-hash.js') }}"></script>
<!-- NAVIGASI BAR -->
<script src="{{ asset('frontpage/assets/js-leaflet/Leaflet.NavBar.js') }}"></script>
<!-- MAIN JS -->
<script src="{{ asset('frontpage/js/main.js') }}"></script>
<!-- Sidebar Custom JS -->
<script src="{{ asset('frontpage/js/sidebar.js') }}"></script>
<!-- CHART-POPUP MARKER JS -->
<script src="{{ asset('frontpage/js/gee/chart_popup.js') }}"></script>

<!-- Plugin leaflet draw JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
<!-- turf and axios -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Turf.js/6.5.0/turf.min.js"></script>

<!-- Fitur Draw JS -->
<script src="{{ asset('frontpage/js/draw.js') }}"></script>
{{-- DATA GEO SERVER js --}}
<script src="{{ asset('frontpage/js/geoserver/geoserver.js') }}"></script>
{{-- Data from Google Earth Engine JS --}}
<script src="{{ asset('frontpage/js/gee/layer_gee.js') }}"></script>

</html>
