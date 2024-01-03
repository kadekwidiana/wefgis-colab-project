@extends('backpage.layouts.main')

@section('content')
    <!-- strat content -->
    <div class="bg-gray-100 flex-1 p-6 md:mt-16">
        <!-- Start Recent Sales -->
        <div class="card col-span-2 xl:col-span-1">
            <div class="flex justify-between items-center card-header">
                <h1 class="h5">Edit Data</h1>
            </div>
        </div>

        <div class="grid grid-cols-3 lg:grid-cols-1 gap-5 mt-2">
            <form id="form-create" method="POST" action="{{ route('spatialGroup.update', $spatialGroups->group_id) }}">
                @method('PUT')
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="regency_id"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Regency</label>
                            <div>
                                <select id="regency_id" name="regency_id"
                                    class="form-input1 shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    required>
                                    <option value="" disabled selected>Select Regency</option>
                                    @foreach ($regencies as $regency)
                                        <option value="{{ $regency->regency_id }}"
                                            {{ old('Select Regency', $regency->regency_id) == $regency->regency_id ? 'selected' : '' }}>
                                            {{ $regency->regency_id }}
                                            {{ $regency->regency }}</option>
                                    @endforeach
                                    <!-- Add more options as needed -->

                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="Name" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Name
                            </label>
                            <input type="text" id="name"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Name Layer" required name="name"
                                value="{{ old('title', $spatialGroups->name) }}">
                        </div>
                        <div class="mb-3">
                            <label for="active"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">active
                            </label>
                            <div class="flex gap-4">
                                <div class="flex items-center me-4 gap-2">
                                    <input id="non-active-radio" type="radio" value="0" name="active"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        {{ old('active', $spatialGroups->active) == 0 ? 'checked' : '' }}>
                                    <label for="non-active-radio"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">non active</label>
                                </div>
                                <div class="flex items-center me-4 gap-2">
                                    <input id="active-radio" type="radio" value="1" name="active"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                                        {{ old('active', $spatialGroups->active) == 1 ? 'checked' : '' }}>
                                    <label for="active-radio"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">active</label>
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="btn-bs-primary ml-auto lg:mr-0 lg:mb-6 px-2 w-24">Submit</button>
                    </div>
                </div>
            </form>
            <div class="card col-span-2" id="map" style="z-index: 2;">
                <div class="card-body">

                </div>
            </div>
        </div>


    </div>
    <!-- end content -->
@endsection
@push('addon-script')
    @include('backpage.package.package-js')
    <script>
        // Maps Leaflet
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
            layers: openStreetMap
        });

        // Feature search with GeoCoder plugin
        const osmGeocoder = new L.Control.Geocoder({
            collapsed: true,
            position: 'topleft',
            text: 'Search',
            title: 'Testing'
        }).addTo(map);
        document.getElementsByClassName('leaflet-control-geocoder-icon')[0]
            .className += ' fa-solid fa-magnifying-glass fa-xl';
        document.getElementsByClassName('leaflet-control-geocoder-icon')[0]
            .title += 'Search for a place';

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

        // Tambahkan marker untuk lokasi pengguna
        // navigator.geolocation.getCurrentPosition(
        //     (position) => {
        //         const {
        //             latitude,
        //             longitude
        //         } = position.coords;
        //         const userMarker = L.marker([latitude, longitude]).addTo(map);
        //         userMarker.bindPopup('Your Location').openPopup();
        //         map.setView([latitude, longitude], 20);
        //     },
        //     (error) => {
        //         console.error('Error getting user location:', error.message);
        //     }, {
        //         enableHighAccuracy: true
        //     }
        // );

        // get altitude
        function getAltitude(lat, lng) {
            $.ajax({
                url: '/get-altitude',
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                data: JSON.stringify({
                    latitude: lat,
                    longitude: lng,
                }),
                dataType: 'json',
                success: function(data) {
                    $('#altitude').val(data.altitude)
                    // console.log('Altitude:', data.altitude);
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }

        // get address
        function getAddress(lat, lng) {
            $.ajax({
                url: `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    const address = response.display_name;
                    $('#address').val(address);
                },
                error: function(error) {
                    console.error(error);
                }
            });

            // USE THIS IF PROBLEM CROSS ORIGIN
            // $.ajax({
            //     url: '/get-address',
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json',
            //         'X-CSRF-TOKEN': '{{ csrf_token() }}',
            //     },
            //     data: JSON.stringify({
            //         latitude: lat,
            //         longitude: lng,
            //     }),
            //     dataType: 'json',
            //     success: function(data) {
            //         $('#address').val(data.address);
            //         console.log(data);
            //         // console.log('Altitude:', data.altitude);
            //     },
            //     error: function(error) {
            //         console.error('Error:', error);
            //     }
            // });
        }

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
            // Remove only elements of the appropriate type
            if (type === 'marker') {
                drawnItems.eachLayer(function(existingLayer) {
                    if (existingLayer instanceof L.Marker) {
                        drawnItems.removeLayer(existingLayer);
                    }
                });
            } else if (type === 'polygon') {
                drawnItems.eachLayer(function(existingLayer) {
                    if (existingLayer instanceof L.Polygon) {
                        drawnItems.removeLayer(existingLayer);
                    }
                });
            }
            // Add new elements draw
            drawnItems.addLayer(layer);

            // Condition type marker
            if (type === 'marker') {
                // Take coordinate from draw element
                const coordinates = layer.getLatLng();
                const lat = coordinates.lat;
                const lng = coordinates.lng;

                // call the func getAltitude & getAddress
                getAltitude(lat, lng);
                getAddress(lat, lng);

                $('#latitude').val(lat);
                $('#longitude').val(lng);
            }
            // Condition type polygon
            if (type == 'polygon') {
                // Take coordinate from draw element on JSON format
                const aoi = layer.toGeoJSON().geometry;
                $('#aoi').val(JSON.stringify(aoi));

                //Calculate and display the wide area
                const area = turf.area(layer.toGeoJSON());
                $('#wide').val(area.toFixed(2));
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

                    // call the func getAltitude & getAddress
                    getAltitude(lat, lng);
                    getAddress(lat, lng);

                    $('#latitude').val(lat);
                    $('#longitude').val(lng);
                }

                // Condition type polygon
                if (type == 'polygon') {
                    // Take coordinate from draw element on JSON format
                    const aoi = layer.toGeoJSON().geometry;
                    $('#aoi').val(JSON.stringify(aoi));

                    //Calculate and display the area
                    const area = turf.area(layer.toGeoJSON());
                    $('#wide').val(area.toFixed(2));
                }
            });
        });

        // Delete data geojson
        map.on('draw:deleted', function(e) {
            const deletedLayers = e.layers;
            deletedLayers.eachLayer(function(layer) {
                $('#latitude').val('');
                $('#longitude').val('');
                $('#altitude').val('');
                $('#address').val('');
                $('#aoi').val('');
                $('#wide').val('');
            });
        });


        // method untuk update layer 
        function updateLayer() {

            // map.removeLayer(googleHibridMap);
            let layerUrl = document.getElementById('spatial_url').value;

            let wmsLayer = L.tileLayer.wms(, {
                layers: 'topp:states', //name layer
                format: 'image/png',
                transparent: true,
            })
            wmsLayer.addTo(map);
        }
        // updateLayer()

        // var wmsLayer = L.tileLayer.wms('http://ows.mundialis.de/services/service?', {
        //     layers: 'OSM-Overlay-WMS'
        // }).addTo(map);
    </script>
@endpush
