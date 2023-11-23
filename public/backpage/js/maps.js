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
map.on('draw:created', function (e) {
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
map.on('draw:edited', function (e) {
    const editedLayers = e.layers;
    editedLayers.eachLayer(function (layer) {
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
map.on('draw:deleted', function (e) {
    const deletedLayers = e.layers;
    deletedLayers.eachLayer(function (layer) {
        //Destroy value in HTML
        $('#geometry').val('');
        $('#type').val('');
    });
});