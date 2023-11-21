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
        const type = layer instanceof L.Marker ? 'marker' : 'polygon'; // Determine the edited shape type

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