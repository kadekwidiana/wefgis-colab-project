<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
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
</head>

<body class="bg-gray-100">
    @include('backpage.layouts.navbar')

    <!-- strat wrapper -->
    <div class="h-screen flex flex-row flex-wrap">

        @include('backpage.layouts.sidebar')

        {{-- content --}}
        @yield('content')


    </div>
    <!-- end wrapper -->

    <!-- Leaflet CDN JS -->
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
        integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>
    <!-- script -->
    <script src="{{ asset('backpage/js/scripts.js') }}"></script>

    <!-- Plugin leaflet draw JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet.draw/1.0.4/leaflet.draw.js"></script>
    <!-- turf and axios -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Turf.js/6.5.0/turf.min.js"></script>
    <!-- SEEARCH FEATURE with GeoCoder -->
    <script src="{{ asset('frontpage/assets/js-leaflet/leaflet-control-geocoder.Geocoder.js') }}"></script>
    <!-- end script -->
    <script>
        // List Basemap
        const openStreetMap = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '©OpenStreetMap Contributors',
        });

        const satelliteMap = L.tileLayer('https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
            attribution: '©Google Satellite Map',
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
            maxZoom: 20
        });

        const googleHibridMap = L.tileLayer('http://{s}.google.com/vt?lyrs=s,h&x={x}&y={y}&z={z}', {
            attribution: '©Google Hybrid Map',
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
            maxZoom: 20
        });

        const googleTerrain = L.tileLayer('https://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
            attribution: '©Google Terrain'
        });

        const googleTraffic = L.tileLayer('http://{s}.google.com/vt/lyrs=m,traffic&hl=en&x={x}&y={y}&z={z}&s=Ga', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
            attribution: '©Google Traffic'
        });

        var map = L.map('map', {
            center: [-8.12826020526256, 115.09382752467408],
            zoom: 12,
            zoomControl: false,
            layers: googleHibridMap
        });

        // Custom zoom control
        const customZoomControl = L.control.zoom({
            position: 'bottomright'
        });
        // Add the custom zoom control to the map
        map.addControl(customZoomControl);

        var baseMaps = {
            "OpenStreetMap": openStreetMap,
            "Google Satelite": satelliteMap,
            "Google Hibrid": googleHibridMap,
            "Google Terrain": googleTerrain,
            "Google Traffic": googleTraffic,
        };

        var layerControl = L.control.layers(baseMaps).addTo(map);


        // Layer draw
        const drawnItems = new L.FeatureGroup(); //For save the elemen in draw
        map.addLayer(drawnItems); //Added fitur grup to maps
        const drawControl = new L.Control.Draw({
            position: 'topleft',
            draw: {
                polygon: {
                    shapeOptions: {
                        color: 'green', // Color border polygon
                        fillColor: 'rgba(0, 0, 0, 0.5)' // Fill color blue tranparant
                    },
                    allowIntersection: false,
                    drawError: {
                        color: 'orange',
                        timeout: 1000 //= 1 second
                    },
                    showArea: true, //Show polygon area when draw
                    metric: false,
                    repeatMode: true
                },
                // Fitur non aktif
                polyline: false,
                circlemarker: false, //circlemarker type has been disabled.
                rect: false,
                circle: false,
                rectangle: false

            },
            edit: {
                featureGroup: drawnItems
            }
        });
        map.addControl(drawControl); //Add to map

        // Create data geojson when draw element
        map.on('draw:created', function(e) {
            const type = e.layerType,
                layer = e.layer;
            drawnItems.addLayer(layer);
            // Condition type marker
            if (type === 'marker') {
                // Take coordinate from draw element
                const coordinates = layer.getLatLng();
                const lat = coordinates.lat;
                const lng = coordinates.lng;

                // Add coordinates and type to respective HTML elements
                $('#geometry').val("[" + lng + "," + lat + "]");
                $('#type').val('point');
            }
            // Condition type polygon
            if (type == 'polygon') {
                // Take coordinate from draw element on JSON format
                const coordinates = layer.toGeoJSON().geometry.coordinates;
                $('#geometry').val(JSON.stringify(coordinates));
                $('#type').val('polygon'); //Take type

                // Calculate and display the area
                // const area = turf.area(layer.toGeoJSON());
                // document.getElementById('area').value = area.toFixed(2);
            }

        });

        // Edit data geojson
        map.on('draw:edited', function(e) {
            const editedLayers = e.layers;
            editedLayers.eachLayer(function(layer) {
                const type = layer instanceof L.Marker ? 'marker' :
                    'polygon'; // Determine the edited shape type

                if (type === 'marker') {
                    // Extract coordinates from the layer options
                    const coordinates = layer.getLatLng();
                    const lat = coordinates.lat;
                    const lng = coordinates.lng;

                    // Add coordinates to respective HTML elements
                    $('#geometry').val("[" + lng + "," + lat + "]");
                    $('#type').val('point'); //Make type
                }

                if (type == 'polygon') {
                    // Take coordinate from draw element on JSON format
                    const coordinates = layer.toGeoJSON().geometry.coordinates;
                    $('#geometry').val(JSON.stringify(coordinates));
                    $('#type').val('polygon'); //Make type

                    // Calculate and display the area
                    // const area = turf.area(layer.toGeoJSON());
                    // document.getElementById('area').value = area.toFixed(2);
                }
            });
        });

        // Delete data geojson
        map.on('draw:deleted', function(e) {
            const deletedLayers = e.layers;
            deletedLayers.eachLayer(function(layer) {
                //Destroy value in HTML
                $('#geometry').val('');
                $('#type').val('');
            });
        });
    </script>
    @stack('addon-script')
</body>

</html>
