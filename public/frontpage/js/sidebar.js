// get width sreen
const screenWidth = window.innerWidth || document.documentElement.clientWidth || document.body.clientWidth;

// Determines the sidebar width based on the screen width
let sidebarWidthLeft = 450;
let sidebarWidthRight = 250;

if (screenWidth <= 480) {
    // if width screen HP
    sidebarWidthLeft = 250;
    sidebarWidthRight = 200;
}

// START JS SIDEBAR RIGHT
// Adjust the position control sidebar right
function adjustPositionControlSidebarRight(sidebarClass) {
    const sidebarWidth = document.querySelector(sidebarClass + '.active') ? sidebarWidthRight : 0; // Adjust the width based on sidebar visibility

    // Set position control leaflet
    const controlContainersLeaflet = document.querySelectorAll('.leaflet-control-zoom, .leaflet-control-attribution');
    controlContainersLeaflet.forEach(function (controlContainerLeaflet) {
        controlContainerLeaflet.style.right = sidebarWidth + 'px';
    });

    // Set position control basemap, layer, legend, street view, legend GEE
    const controlContainers = document.querySelectorAll('.container-control-basemap, .container-control-layer, .container-control-legend,.container-control-street-view, .control-legend-gee');
    controlContainers.forEach(function (controlContainer) {
        controlContainer.style.right = sidebarWidth + 'px';
    });
}
// func close basemap sidebar
function closeBasemapSidebar() {
    const basemapSidebar = document.getElementById("sidebar-basemap");
    if (basemapSidebar.classList.contains("active")) {
        basemapSidebar.classList.remove("active");
        adjustPositionControlSidebarRight('.sidebar-basemap'); // Call the function to adjust control positions
        const basemapButton = document.querySelector('.container-control-basemap button');
        basemapButton.classList.remove("active"); // Remove active class from the button
    }
}

// Function to close layer sidebar and adjust icons
function closeLayerSidebar() {
    const layerSidebar = document.getElementById("sidebar-layer");
    if (layerSidebar.classList.contains("active")) {
        layerSidebar.classList.remove("active");
        adjustPositionControlSidebarRight('.sidebar-layer'); // Call the function to adjust control positions
        const layerButton = document.querySelector('.container-control-layer button');
        layerButton.classList.remove("active"); // Remove active class from the button
    }
}

// Function to close legend sidebar and adjust icons
function closeLegendSidebar() {
    const layerSidebar = document.getElementById("sidebar-legend");
    if (layerSidebar.classList.contains("active")) {
        layerSidebar.classList.remove("active");
        adjustPositionControlSidebarRight('.sidebar-legend'); // Call the function to adjust control positions
        const layerButton = document.querySelector('.container-control-legend button');
        layerButton.classList.remove("active"); // Remove active class from the button
    }
}

// Control button basemaps
const customControlBasemap = L.Control.extend({
    options: {
        position: 'topright'
    },

    onAdd: function () {
        const container = L.DomUtil.create('div', 'btn btn-light btn-outline-secondary container-control-basemap');
        const button = L.DomUtil.create('button', 'button-control-basemap', container);
        const image = document.createElement('img');
        image.src = 'frontpage/assets/icons/icon-control/icon-basemap.png';
        image.className = 'custom-image';
        button.appendChild(image);

        container.addEventListener("click", function () {
            closeLayerSidebar(); // Close layer sidebar if open
            closeLegendSidebar(); // Close layer sidebar if open
            if (screenWidth <= 480) {
                closeAnalisisSidebar();
            }
            document.getElementById("sidebar-basemap").classList.toggle("active");
            adjustPositionControlSidebarRight('.sidebar-basemap'); // Call the function to adjust control positions
            const basemapButton = document.querySelector('.container-control-basemap button');
            basemapButton.classList.toggle("active"); // Toggle active class on the button
        });

        return container;
    }
});
// Add the custom button to the map
map.addControl(new customControlBasemap());

// Control button layer
const customControlLayer = L.Control.extend({
    options: {
        position: 'topright'
    },

    onAdd: function () {
        const container = L.DomUtil.create('div', 'btn btn-light btn-outline-secondary container-control-layer');
        const button = L.DomUtil.create('button', 'button-control-layer', container);
        const image = document.createElement('img');
        image.src = 'frontpage/assets/icons/icon-control/icon-layer.png';
        image.className = 'custom-image';
        button.appendChild(image);


        container.addEventListener("click", function () {
            closeBasemapSidebar(); // Close basemap sidebar if open
            closeLegendSidebar(); // Close basemap sidebar if open
            if (screenWidth <= 480) {
                closeAnalisisSidebar();
            }
            document.getElementById("sidebar-layer").classList.toggle("active");
            adjustPositionControlSidebarRight('.sidebar-layer'); // Call the function to adjust control positions
            const layerButton = document.querySelector('.container-control-layer button');
            layerButton.classList.toggle("active"); // Toggle active class on the button
        });

        return container;
    }
});
// Add the custom button to the map
map.addControl(new customControlLayer());

// Control button legend
const customControlLegend = L.Control.extend({
    options: {
        position: 'topright'
    },

    onAdd: function () {
        const container = L.DomUtil.create('div', 'btn btn-light btn-outline-secondary container-control-legend');
        const button = L.DomUtil.create('button', 'button-control-legend', container);
        const icon = L.DomUtil.create('i', 'fa-solid fa-list fa-xl');
        button.appendChild(icon);

        container.addEventListener("click", function () {
            closeBasemapSidebar(); // Close basemap sidebar if open
            closeLayerSidebar(); // Close basemap sidebar if open
            if (screenWidth <= 480) {
                closeAnalisisSidebar();
            }
            document.getElementById("sidebar-legend").classList.toggle("active");
            adjustPositionControlSidebarRight('.sidebar-legend'); // Call the function to adjust control positions
            const layerButton = document.querySelector('.container-control-legend button');
            layerButton.classList.toggle("active"); // Toggle active class on the button
        });

        return container;
    }
});
// Add the custom button to the map
map.addControl(new customControlLegend());

// Control button street view
const controlStreetView = L.Control.extend({
    options: {
        position: 'bottomright'
    },

    onAdd: function () {
        const container = L.DomUtil.create('div', 'btn btn-light btn-outline-secondary container-control-street-view d-none');
        const button = L.DomUtil.create('button', 'button-control-street-view', container);
        const icon = L.DomUtil.create('i', 'fa-solid fa-person fa-lg');
        button.appendChild(icon);

        button.addEventListener("click", function () {
            // Add a click event listener to the map only after the button is clicked
            map.on('click', function (e) {
                let lat = e.latlng.lat.toPrecision(8);
                let lon = e.latlng.lng.toPrecision(8);
                const point = L.marker([lat, lon]).addTo(map)
                    .bindPopup('<a href="http://maps.google.com/maps?q=&layer=c&cbll=' + lat + ',' + lon + '&cbp=11,0,0,0" target="_blank"><b>View</b></a>').openPopup();
            });
        });

        return container;
    }
});
// Add the custom button to the map
map.addControl(new controlStreetView());

// CHANGE AND DISPLAY IMAGE LEGEND GEE
// 
const assetImgLegend = 'frontpage/assets/icons/icon-legend';
// Init create imageLegend
const imageLegend = document.createElement('img');


// Information based on object for every legend
const legends = [
    { id: '#change_intensity, #igbp, #lst, #occurrence, #Transition, #water_season, #ChangeIntensity, #IGBP, #LST, #Occurrence, #WaterSeason, #Transition', url: '/legend_water.jpeg' },
    { id: '#vci_id', url: '/legend_vci.jpeg' },
    { id: '#precipitation_id', url: '/legend_precipitation.jpeg' },
    { id: '#evi_id', url: '/legend_evi.jpeg' },
    { id: '#msi_id', url: '/legend_msi.jpeg' }
];
// Func change image
function changeImageLegend(idValue, urlImage) {
    $(`${idValue}`).on('change', function () {
        if (this.checked) {
            $('#c-gee').removeClass('d-none');
            imageLegend.src = `${assetImgLegend}${urlImage}`;
            // console.log(imageLegend.src);
        } else {
            // $('#c-gee').addClass('d-none');
        }
    });
}

// Control legend GEE
const controlLegendGEE = L.Control.extend({
    options: {
        position: 'bottomright'
    },

    onAdd: function () {
        const container = L.DomUtil.create('div', 'bg-light container-control-street-view d-none');
        container.setAttribute('id', 'c-gee');
        const button = L.DomUtil.create('button', 'button-control-legend-gee', container);
        imageLegend.className = 'custom-image-gee';
        button.appendChild(imageLegend);

        // Loop legend information and call func changeImageLegend
        legends.forEach(legend => {
            changeImageLegend(legend.id, legend.url);
        });

        return container;
    }
});
// Add the custom button to the map
map.addControl(new controlLegendGEE());
// END SIDEBAR RIGTH

// START SIDEBAR LEFT
// Adjust the position control sidebar left
function adjustPositionControlSidebarLeft(sidebarClass) {
    const sidebarWidth = document.querySelector(sidebarClass + '.active') ? sidebarWidthLeft : 0; // Adjust the width based on sidebar visibility

    // Set position control leaflet
    const controlContainersLeaflet = document.querySelectorAll('.leaflet-control-scale, .leaflet-control-geocoder, .leaflet-control-navbar, .leaflet-draw ');
    controlContainersLeaflet.forEach(function (controlContainerLeaflet) {
        controlContainerLeaflet.style.left = sidebarWidth + 'px';
    });

    // Set position control analisis
    const controlContainers = document.querySelectorAll('.container-control-analisis');
    controlContainers.forEach(function (controlContainer) {
        controlContainer.style.left = sidebarWidth + 'px';
    });
}

// Function to close basemap sidebar and adjust icons
function closeAnalisisSidebar() {
    const basemapSidebar = document.getElementById("sidebar-analisis");
    if (basemapSidebar.classList.contains("active")) {
        basemapSidebar.classList.remove("active");
        adjustPositionControlSidebarLeft('.sidebar-analisis.active'); // Call the function to adjust control positions
        const basemapButton = document.querySelector('.container-control-analisis button');
        basemapButton.classList.remove("active"); // Remove active class from the button
    }
}


// Control button analisis
const customControlAnalisis = L.Control.extend({
    options: {
        position: 'topleft'
    },

    onAdd: function () {
        const container = L.DomUtil.create('div', 'btn btn-light btn-outline-secondary container-control-analisis');
        const button = L.DomUtil.create('button', 'button-control-analisis', container);
        const icon = L.DomUtil.create('i', 'fa-solid fa-magnifying-glass-chart');
        button.appendChild(icon);

        container.addEventListener("click", function () {
            if (screenWidth <= 480) {
                closeBasemapSidebar();
                closeLayerSidebar();
                closeLegendSidebar();
            }
            document.getElementById("sidebar-analisis").classList.toggle("active");
            adjustPositionControlSidebarLeft('.sidebar-analisis.active'); // Call the function to adjust control positions
            const layerButton = document.querySelector('.container-control-analisis button');
            layerButton.classList.toggle("active"); // Toggle active class on the button
        });

        return container;
    }
});
// Add the custom button to the map
map.addControl(new customControlAnalisis());

// Navigasi bar control in left
L.control.navbar().addTo(map);

// Hash in URL
const hash = new L.Hash(map);

// Control skala in botomleft
L.control.scale().addTo(map);