@extends('frontpage.layouts.main')

@section('content')

    <body>
        @include('frontpage.layouts.navbar')
        {{-- @include('frontpage.layouts.sidebar') --}}
        {{-- SIDEBAR --}}
        {{-- Sidebar basemap --}}
        @include('frontpage.component.sidebar.basemap')

        {{-- Sidebar legend --}}
        @include('frontpage.component.sidebar.legend')

        {{-- Sidebar analisis --}}
        @include('frontpage.component.sidebar.analisis')

        <!-- Sidebar layer -->
        @include('frontpage.component.sidebar.layer')

        <!-- Content -->
        <div class="content">
            <div id="map">
            </div>
            <div class="mt" id="leaflet-map-error"></div>
            <div id="leaflet-map-bounds"></div>
            <div id="leaflet-locations"></div>
        </div>
    </body>
    {{-- package js --}}
    @include('frontpage.package.package-js')
    {{-- logic js layer geoserver --}}
    @include('frontpage.js.layer.geoserver')
    {{-- logic js layer data area --}}
    @include('frontpage.js.layer.data-area')
    {{-- logic js layer static layer --}}
    @include('frontpage.js.layer.func-static-layer')
@endsection
