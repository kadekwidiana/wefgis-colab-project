// List Basemap
const openStreetMap = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '©OpenStreetMap Contributors',
});

const googleStreetMap = L.tileLayer('http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}', {
    attribution: '©Google StreetMap',
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    maxZoom: 20
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

const openTopoMap = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
    attribution: '©OpenTopoMap Contributors',

});
const esriSatelite = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}', {
    attribution: '©<a href="https://www.esri.com">Esri Satelite</a>',
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    maxZoom: 20
});
const esriWorldStreetMap = L.tileLayer('https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}', {
    attribution: '©<a href="https://www.esri.com">Esri Street</a>',
    subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
    maxZoom: 20
});
const googleEarth = L.tileLayer('https://storage.googleapis.com/global-surface-water/tiles2021/transitions/{z}/{x}/{y}.png', {
    attribution: '©<a href="https://www.thunderforest.com/maps/landscape/">Thunderforest</a>',
});

// Init
const _zoom = 10;
const coorChachoengsao = [13.666790631230649, 101.35322935835381];
const coorNakhon = [13.93136446765414, 100.086705447267];

// Initialize the map with the default basemap
const map = L.map('map', {
    layers: googleHibridMap,
    center: coorChachoengsao,
    zoom: _zoom,
    minZoom: 5,
    zoomControl: false
});

// Event listener for radio input select layer Chachoengsao and Nakhon
const radioInputs = document.querySelectorAll('input[name="select_layer"]');
radioInputs.forEach(input => {
    input.addEventListener('change', function () {
        // Get the selected layer value
        const selectedLayer = this.value;
        // Update map view based on the selected layer
        // Display and  do not display div layer if selected input radio Chachoengsao or Nakhon
        if (selectedLayer === "chachoengsao") {
            $('#layer_chachoengsao').removeClass('d-none');
            $('#layer_nakhon').addClass('d-none');
            map.setView(coorChachoengsao, _zoom);
        } else if (selectedLayer === "nakhon") {
            $('#layer_chachoengsao').addClass('d-none');
            $('#layer_nakhon').removeClass('d-none'); 
            map.setView(coorNakhon, _zoom);
        }
    });
});

//basemap Google Maps Label
const googleMapsLabel = L.tileLayer('https://earthengine.googleapis.com/v1/projects/earthengine-legacy/maps/6e20dcda0306d1612c1c93896fabf4bd-3812d50f5e3a412f3e1a16d9f1970210/tiles/%7Bz%7D/%7Bx%7D/%7By%7D', {
    attribution: '©<a href="https://www.google.com/maps">Google Maps Label</a>',
});

// Func for set visible layer Google Maps Label based checkbox selected
function updateGoogleMapsLabelVisibility() {
    if (document.getElementById('googleMapsLabel').checked) {
        map.addLayer(googleMapsLabel);
    } else {
        map.removeLayer(googleMapsLabel);
    }
}
// Event listener for active function while checkbox change
document.getElementById('googleMapsLabel').addEventListener('change', updateGoogleMapsLabelVisibility);

// Fungsi untuk mengganti basemap
// Func for change selected basemap
function changeBasemap(newBasemap) {
    map.eachLayer(function (layer) {
        if (layer !== newBasemap) {
            map.removeLayer(layer);
        }
    });
    newBasemap.addTo(map);
}

// List option basemap and id element input related in HTML
const basemapOptions = [
    { name: 'openStreetMap', layer: openStreetMap },
    { name: 'googleStreetMap', layer: googleStreetMap },
    { name: 'satelliteMap', layer: satelliteMap },
    { name: 'googleHibridMap', layer: googleHibridMap },
    { name: 'googleTerrain', layer: googleTerrain },
    { name: 'googleTraffic', layer: googleTraffic },
    { name: 'openTopoMap', layer: openTopoMap },
    { name: 'esriWorldStreetMap', layer: esriWorldStreetMap },
    { name: 'esriSatelite', layer: esriSatelite },
    { name: 'googleEarth', layer: googleEarth }
];

// Loop for added eventlistener to every input in HTML
basemapOptions.forEach(function (option) {
    document.querySelector('input[value="' + option.name + '"]').addEventListener('change', function () {
        changeBasemap(option.layer);
    });
});

// Selected all image basemap in HTML
const basemapImages = document.querySelectorAll('.sidebar-basemap img');
// Add eventlistener on every basemap image
basemapImages.forEach(function (image) {
    image.addEventListener('click', function () {
        const radio = this.closest('label').querySelector('input[type="radio"]');
        radio.checked = true;

        const selectedBasemap = radio.value;

        // Remove basemap was not selected
        basemapOptions.forEach(function (option) {
            if (option.name !== selectedBasemap) {
                map.removeLayer(option.layer);
            }
        });

        // Condition and add basemap was selected
        switch (selectedBasemap) {
            case 'openStreetMap':
                openStreetMap.addTo(map);
                break;
            case 'googleStreetMap':
                googleStreetMap.addTo(map);
                break;
            case 'satelliteMap':
                satelliteMap.addTo(map);
                break;
            case 'googleHibridMap':
                googleHibridMap.addTo(map);
                break;
            case 'googleTerrain':
                googleTerrain.addTo(map);
                break;
            case 'googleTraffic':
                googleTraffic.addTo(map);
                break;
            case 'openTopoMap':
                openTopoMap.addTo(map);
                break;
            case 'esriWorldStreetMap':
                esriWorldStreetMap.addTo(map);
                break;
            case 'esriSatelite':
                esriSatelite.addTo(map);
                break;
            case 'googleEarth':
                googleEarth.addTo(map);
                break;
            default:
                break;
        }
    });
});

// ANALYSIS INFORMATION BASED Area Of Interest (AOI) which is depicted by users on maps use feature Draw Leaflet Js
// Func for destroy or remove grafik based id in HTML
function destroyChart(chartId) {
    const existingChart = Chart.getChart(chartId);
    if (existingChart) {
        existingChart.destroy();
    }
}

function getInputValues() {
    return {
        geometry: $("#geometry").val(),
        type: $('#type').val(),
        startYear: $('#startYear').val(),
        endYear: $('#endYear').val(),
        _token: $('meta[name="csrf-token"]').attr('content')
    };
}

// Fungsi untuk menampilkan atau menyembunyikan elemen loading dan grafik
function toggleLoadingAndChartElements(idTag, isLoading) { // idTag Html
    if (isLoading) {
        // isLoading true
        $(`#loading${idTag}`).removeClass('d-none');
        $(`#grafik${idTag}, #${idTag}_id`).addClass('d-none');
        $(`#failedGet${idTag}`).addClass('d-none');
        $('#getInfo').addClass('d-none');
        $('#loadInfo').removeClass('d-none');
    } else {
        // isLoading false
        $(`#loading${idTag}`).addClass('d-none');
    }
}

// Func clear data response
function clearDataResponse(responseDataGEE) {

}


$(document).ready(function () {
    // Func parameter. url => request data to GEE, chartTitle => title on Chart, canvasId => element canvas the id, layerMapGEE => properti response GEE, idCheckBox => element id input checkbox
    function fetchDataAndCreateChart(url, responseKey, chartTitle, canvasId, layerMapGEE, idCheckBox) {
        // Call the func getInputValues()
        const postData = getInputValues();
        // Call the func toggleLoadingAndChartElements, value isLoading = true
        toggleLoadingAndChartElements(layerMapGEE, true);
        // request ajax
        $.ajax({
            type: "POST",
            url: url,
            data: JSON.stringify(postData),
            contentType: "application/json",
            success: function (response) {
                // If there is response
                if (response && response.map) {
                    // Display in element html when response success
                    $(`#loading${layerMapGEE}`).addClass('d-none');
                    $(`#grafik${layerMapGEE}, #${idCheckBox}`).removeClass('d-none');
                    // Condition based on value responseKey
                    if (responseKey == 'MSI') {
                        $('#getInfo').removeClass('d-none');
                        $('#loadInfo').addClass('d-none');
                    }

                    // Call destroyChart for destroy canvasId in HTML if canvas Id there is data
                    destroyChart(canvasId);
                    // console.log(response);
                    // Defined layer map from GEE which obtained
                    const layerMapFromGEE = L.tileLayer(response.map[layerMapGEE]);
                    // Condition idCheckBox is checked
                    if ($('#' + idCheckBox).is(':checked')) {
                        layerMapFromGEE.addTo(map); //Display layer VCI automatic to map if checkbox already checked
                        $('#c-gee').removeClass('d-none');
                        // Change image legend bottomright
                        switch (responseKey) {
                            case 'precipitation':
                                // imageLegend from var imageLegend in sidebar.js
                                imageLegend.src = 'assets/icons/icon-legend/legend_precipitation.jpeg';
                                break;
                            case 'VCI':
                                imageLegend.src = 'assets/icons/icon-legend/legend_vci.jpeg';
                                break;
                            case 'EVI':
                                imageLegend.src = 'assets/icons/icon-legend/legend_evi.jpeg';
                                break;
                            case 'MSI':
                                imageLegend.src = 'assets/icons/icon-legend/legend_msi.jpeg';
                                break;
                            default:
                                break;
                        }
                    }
                    // Condition idCheckBox is checked in element html
                    $('#' + idCheckBox).on('change', function () {
                        if (this.checked) {
                            layerMapFromGEE.addTo(map); //Display layer to map if checkbox is checked
                        } else {
                            layerMapFromGEE.removeFrom(map); //Remove layer in map if not checked
                        }
                    });
                    // Take monthly data from response data from GEE
                    const monthlyData = response.data;
                    // Determine data key that want to access
                    const dataKey = responseKey;
                    // Initialization blank array for save data
                    const dataArray = [];
                    // Loop through the monthly data and retrieve the appropriate values
                    for (let i = 0; i < monthlyData.length; i++) {
                        const value = monthlyData[i][dataKey];
                        dataArray.push(value);
                    }
                    // Initialization blank object for save yearly data
                    const yearlyData = {};
                    // Loop through monthly data to group data into yearly data
                    for (let i = 0; i < monthlyData.length; i++) {
                        // Get the year of the data (assumes 'Year' or 'year' property)
                        const year = monthlyData[i].Year || monthlyData[i].year;
                        // Get value which fits the data
                        const value = monthlyData[i][dataKey];
                        // If the year is not already in the yearlyData object, initialize an array for that year
                        if (!yearlyData.hasOwnProperty(year)) {
                            yearlyData[year] = [];
                        }
                        // Added value into the array appropriate year
                        yearlyData[year].push(value);
                    }

                    // Function to generate a random color
                    // function getRandomColor() {
                    //     const letters = '0123456789ABCDEF';
                    //     const color = '#';
                    //     for (const i = 0; i < 6; i++) {
                    //         color += letters[Math.floor(Math.random() * 16)];
                    //     }
                    //     return color;
                    // }
                    // Init for save dataset
                    const datasets = [];
                    // Color based on year
                    const colorMap = {
                        '2018': 'yellow',
                        '2019': 'orange',
                        '2020': 'red',
                        '2021': 'green',
                        '2022': 'blue'
                    };
                    // Loop through yearly data
                    for (const year in yearlyData) {
                        if (yearlyData.hasOwnProperty(year)) {
                            const color = colorMap[year];
                            // Make datasets object push to array datasets
                            datasets.push({
                                label: year,
                                data: yearlyData[year],
                                backgroundColor: color,
                                borderColor: color,
                                borderWidth: 1,
                            });
                        }
                    }

                    // const markerIndex = data[index].id;
                    // Get element canvasId context 2d
                    const ctx = document.getElementById(canvasId).getContext('2d');
                    // Create graph used Chart.js
                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12], //label x (month)
                            datasets: datasets,
                        },
                        options: {
                            responsive: true,
                            scales: {
                                x: {
                                    beginAtZero: true,
                                    maxTicksLimit: 12,
                                },
                                y: {
                                    // min and max condition based responseKey
                                    min: (responseKey === 'EVI' || responseKey === 'MSI') ? Math.min(...dataArray) - 0.1 : Math.min(...dataArray) - 10,
                                    max: (responseKey === 'EVI' || responseKey === 'MSI') ? Math.max(...dataArray) + 0.1 : Math.max(...dataArray) + 50,
                                    beginAtZero: true,
                                }
                            },
                            plugins: {
                                title: {
                                    display: true,
                                    text: chartTitle,
                                    position: 'top'
                                },
                                legend: {
                                    display: true,
                                    position: 'right',
                                    labels: {
                                        usePointStyle: true,
                                        pointStyle: 'circle',
                                        pointRadius: 8,
                                    }
                                }
                            }
                        }
                    });

                } else {
                    // console.error('Errorrrr')
                    // Display button in element html if error
                    $('#getInfo').removeClass('d-none');
                    $('#loadInfo').addClass('d-none');
                    // Condition based on responseKey
                    // Call the func toggleLoadingAndChartElements. idTag from parameter layerMapGEE, isLoading = false
                    toggleLoadingAndChartElements(layerMapGEE, false);
                    // Display element #failedGet in every section display graphic
                    $(`#failedGet${layerMapGEE}`).removeClass('d-none');
                }
            },
            // Error handle
            error: function (error) {
                // console.log("Fail:", error);
                // Display button in element html if error
                $('#getInfo').removeClass('d-none');
                $('#loadInfo').addClass('d-none');
                // Call the func toggleLoadingAndChartElements. idTag from parameter layerMapGEE, isLoading = false
                toggleLoadingAndChartElements(layerMapGEE, false);
                // Display element #failedGet in every section display graphic
                $(`#failedGet${layerMapGEE}`).removeClass('d-none');
            }
        });
    }

    // Func for init when button onclick
    function initializeOnClickActions() {
        $("#reqInfo").click(function () {
            fetchDataAndCreateChart("/precipitation", "precipitation", "Cumulative Rainfall (mm)", "chartRequestPrecipitation", "Precipitation", "precipitation_id");
            fetchDataAndCreateChart("/vci", "VCI", "VCI", "chartRequestVci", "VCI", "vci_id");
            fetchDataAndCreateChart("/evi", "EVI", "EVI", "chartRequestEvi", "EVI", "evi_id");
            fetchDataAndCreateChart("/evi", "MSI", "MSI", "chartRequestMsi", "MSI", "msi_id");
        });
    }
    // Call the func
    initializeOnClickActions();

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
    position: 'bottomleft'  // Set the position to bottom right
});
// Add the custom zoom control to the map
// map.addControl(customZoomControl);


// Menambahkan event listener untuk checkbox
const checkboxes = document.querySelectorAll('.itemCheckbox');
checkboxes.forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {
        const layerName = this.getAttribute('data-layer');
        const layer = window[layerName];

        if (this.checked) {
            map.addLayer(layer);
        } else {
            map.removeLayer(layer);
        }
    });
});



// POINT NAKHON
const finalNakhon = L.layerGroup();

// Func create icon marker
function iconFinalNakhon(iconUrl) {
    return L.icon({
        iconUrl: iconUrl,
        iconSize: [25, 32],
        iconAnchor: [16, 32],
        popupAnchor: [0, -32]
    });
}

function checkboxFinalNakhon(checkboxId, layer) {
    document.getElementById(checkboxId).addEventListener('change', function () {
        if (this.checked) {
            layer.addTo(map); // Dislay layer to map
        } else {
            layer.removeFrom(map); // Remove layer
        }
    });
}

checkboxFinalNakhon('final_nakhon', finalNakhon);

$.getJSON("/pointNakhon", function (data) {
    // console.log(data);
    $.each(data, function (index) {
        const marker = L.marker([parseFloat(data[index].latitude), parseFloat(data[index]
            .longitude)], { icon: iconFinalNakhon(`${data[index].icon}`) }
        );
        const popupContent = `
        <div class="popup-container2">
            <div class="popup-header">Name : ${data[index].project_name}</div>
            <div class="popup-coordinates">Coordinate : ${data[index].latitude},${data[index].longitude}</div>
            <div class="popup-address mb-2">Address : <span id="address-placeholder">Loading...</span></div>
            <div class="popup-address mb-2">
            <a style="text-decoration: none;" href="http://maps.google.com/maps?q=&layer=c&cbll=${data[index].latitude},${data[index].longitude}&cbp=11,0,0,0" target="_blank"><b>Street View</b></a>
            </div>

            <!-- Add Bootstrap tabs -->
            <ul class="nav nav-tabs justify-content-center" role="tablist">
            <li class="nav-item"><a class="nav-link active" href="#chart1-${data[index].id}" role="tab" data-toggle="tab">Cumulative Rainfall</a></li>
            <li class="nav-item"><a class="nav-link" href="#chart2-${data[index].id}" role="tab" data-toggle="tab">VCI</a></li>
            </ul>

            <div class="tab-content">
            <div role="tabpanel" class="tab-pane active" id="chart1-${data[index].id}">
                <div id="failed1">Data not found</div>
                <div id="loading1"><div class="spinner-border text-secondary" role="status">
                <span class="visually-hidden">Loading...</span>
                </div></div>
                <canvas id="myChart1${data[index].id}" width="600" height="400"></canvas>
            </div>
            <div role="tabpanel" class="tab-pane" id="chart2-${data[index].id}">
                <div id="failed2">Data not found</div>
                <div id="loading2">
                <div class="spinner-border text-secondary" role="status">
                <span class="visually-hidden">Loading...</span>
                </div>
                </div>
                <canvas id="myChart2${data[index].id}" width="600" height="400"></canvas>
            </div>
            </div>
        </div>
        `;
        // Popup set content
        const popup = L.popup().setContent(popupContent);
        marker.addTo(finalNakhon).bindPopup(popup);
        // console.log(`code : ${data[index].project_code} icon : ${data[index].icon}`);
        // // console.log(data[index].longitude);
        // L.marker([parseFloat(data[index].latitude), parseFloat(data[index]
        //     .longitude)], { icon: iconFinalNakhon(`${data[index].icon}`) }
        // ).addTo(finalNakhon);
        marker.on('click', function () {
            const addressPlaceholder = document.getElementById('address-placeholder');
            // Get address with request to nominatim.openstreetmap API
            $.getJSON(`https://nominatim.openstreetmap.org/reverse?format=json&lat=${data[index].latitude}&lon=${data[index].longitude}&zoom=18&addressdetails=1`, function (data) {
                const address = data.display_name;
                addressPlaceholder.textContent = address;
            });

            $('#failed1').hide();
            $('#failed2').hide();

            // Get CRSF token from meta tag HTML
            const csrfToken = $('meta[name="csrf-token"]').attr('content');

            const postData = {
                geometry: '[' + data[index].longitude + ',' + data[index].latitude + ']',
                type: 'point',
                startYear: 2020,
                endYear: 2022
            };

            postData._token = csrfToken;

            // Func parameter for take data and make chart
            function fetchDataAndCreateChart(url, responseKey, chartTitle, canvasId) {
                $.ajax({
                    type: "POST",
                    url: url,
                    data: JSON.stringify(postData),
                    contentType: "application/json",
                    success: function (response) {
                        // Destroy based condition responseKey
                        if (responseKey === 'precipitation') {
                            $('#loading1').addClass('d-none');
                        } else if (responseKey === 'VCI') {
                            $('#loading2').addClass('d-none');
                        }
                        // Take monthly data from response API
                        const monthlyData = response.data;
                        // Determine data key that want to access
                        const dataKey = responseKey;
                        // Initialization blank array for save data
                        const dataArray = [];
                        // Loop through the monthly data and retrieve the appropriate values
                        for (let i = 0; i < monthlyData.length; i++) {
                            const value = monthlyData[i][dataKey];
                            dataArray.push(value);
                        }
                        // Init blank object for save yearly data
                        const yearlyData = {};
                        // Loop through monthly data to group data into yearly data
                        for (let i = 0; i < monthlyData.length; i++) {
                            // Get the year of the data (assumes 'Year' or 'year' property)
                            const year = monthlyData[i].Year || monthlyData[i].year; // Adjust based on your response structure
                            // Get value which fits the data
                            const value = monthlyData[i][dataKey];
                            // If the year is not already in the yearlyData object, initialize an array for that year
                            if (!yearlyData.hasOwnProperty(year)) {
                                yearlyData[year] = [];
                            }
                            // Added value into the array appropriate year
                            yearlyData[year].push(value);
                        }

                        // Function to generate a random color
                        // function getRandomColor() {
                        //     const letters = '0123456789ABCDEF';
                        //     const color = '#';
                        //     for (const i = 0; i < 6; i++) {
                        //         color += letters[Math.floor(Math.random() * 16)];
                        //     }
                        //     return color;
                        // }
                        // Init for save dataset
                        const datasets = [];
                        // Color based on year
                        const colorMap = {
                            '2018': 'yellow',
                            '2019': 'orange',
                            '2020': 'red',
                            '2021': 'green',
                            '2022': 'blue'
                        };
                        // Loop through yearly data
                        for (const year in yearlyData) {
                            if (yearlyData.hasOwnProperty(year)) {
                                const color = colorMap[year];
                                // Make datasets object push to array datasets
                                datasets.push({
                                    label: year,
                                    data: yearlyData[year],
                                    backgroundColor: color,
                                    borderColor: color,
                                    borderWidth: 1,
                                });
                            }
                        }
                        // Marker index based on data[index]
                        const markerIndex = data[index].id;
                        // Get element canvasId context 2d
                        const ctx = document.getElementById(canvasId + markerIndex).getContext('2d');
                        // Create graph used Chart.js
                        new Chart(ctx, {
                            type: 'line',
                            data: {
                                labels: [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12], //label x (month)
                                datasets: datasets,
                            },
                            options: {
                                responsive: true,
                                scales: {
                                    x: {
                                        beginAtZero: true,
                                        maxTicksLimit: 12,
                                    },
                                    y: {
                                        // min and max condition
                                        min: Math.min(...dataArray) - 20,
                                        max: Math.max(...dataArray) + 50,
                                        beginAtZero: true,
                                    }
                                },
                                plugins: {
                                    title: {
                                        display: true,
                                        text: chartTitle,
                                        position: 'top'
                                    },
                                    legend: {
                                        display: true,
                                        position: 'bottom',
                                        labels: {
                                            usePointStyle: true,
                                            pointStyle: 'circle',
                                            pointRadius: 8,
                                        }
                                    }
                                }
                            }
                        });
                    },
                    // Error handle
                    error: function (error) {
                        console.log("Fail:", error);
                        // Display if error based responseKey
                        if (responseKey === 'precipitation') {
                            $('#loading1').addClass('d-none');
                            $('#failed1').show();
                        } else if (responseKey === 'VCI') {
                            $('#loading2').addClass('d-none');
                            $('#failed2').show();
                        }
                    }
                });
            }
            // Call Func fetchDataAndCreateChart() according to the parameters
            fetchDataAndCreateChart("/precipitation", "precipitation", "Cumulative Rainfall (mm)", "myChart1");
            fetchDataAndCreateChart("/vci", "VCI", "VCI", "myChart2");
        });
    })
}).fail(function (jqXHR, textStatus, error) {
    // console.log("Error: " + error);
});





// const cachedData = localStorage.getItem('cachedData');
// const cacheTimestamp = localStorage.getItem('cacheTimestamp');

// if (cachedData && cacheTimestamp) {
//     const currentTime = new Date().getTime();
//     const cacheTime = parseInt(cacheTimestamp);

//     // Cek apakah data masih berlaku (belum kedaluwarsa)
//     if (currentTime - cacheTime < 20000) { // 20 detik (dalam milidetik)
//         // Gunakan data dari cache lokal
//         console.log('Menggunakan data dari cache lokal: ' + cachedData);
//     } else {
//         // Data telah kedaluwarsa, lakukan permintaan ke server lagi
//         fetchDataFromServer().then((data) => {
//             // Simpan data baru di cache lokal
//             localStorage.setItem('cachedData', data);
//             localStorage.setItem('cacheTimestamp', new Date().getTime().toString());
//             console.log('Data dari server: ' + data);
//         });
//     }
// } else {
//     // Jika data tidak ada di cache lokal, lakukan permintaan ke server
//     fetchDataFromServer().then((data) => {
//         // Simpan data di cache lokal
//         localStorage.setItem('cachedData', data);
//         localStorage.setItem('cacheTimestamp', new Date().getTime().toString());
//         console.log('Data dari server: ' + data);
//     });
// }

// async function fetchDataFromServer() {
//     // Lakukan permintaan ke server
//     const response = await fetch('/nakhonmap');
//     const data = await response.text();
//     return data;
// }

