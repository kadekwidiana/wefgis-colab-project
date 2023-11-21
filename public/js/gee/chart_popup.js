// LAYER MARKER CROP CHACHOENGSAO
// Func create icon marker
function createCustomIcon(iconUrl) {
    return L.icon({
        iconUrl: iconUrl,
        iconSize: [25, 32],
        iconAnchor: [16, 32],
        popupAnchor: [0, -32]
    });
}

// Define icons with use the func createCustomIcon
const baresoilIcon = createCustomIcon('assets/icons/icon-marker/baresoil.png');
const cassavaIcon = createCustomIcon('assets/icons/icon-marker/cassava.png');
const cropIcon = createCustomIcon('assets/icons/icon-marker/corn.png');
const eucalyptusIcon = createCustomIcon('assets/icons/icon-marker/eucalyptus.png');
const forestIcon = createCustomIcon('assets/icons/icon-marker/forest.png');
const grasslandIcon = createCustomIcon('assets/icons/icon-marker/grassland.png');
const paddyIcon = createCustomIcon('assets/icons/icon-marker/paddy.png');
const palmIcon = createCustomIcon('assets/icons/icon-marker/palm.png');
const rubberIcon = createCustomIcon('assets/icons/icon-marker/rubber.png');
const settlementIcon = createCustomIcon('assets/icons/icon-marker/gedung.png');
const sugarcaneIcon = createCustomIcon('assets/icons/icon-marker/sugarcan.png');
const waterIcon = createCustomIcon('assets/icons/icon-marker/water.png');
const cornIcon = createCustomIcon('assets/icons/icon-marker/corn.png');

// Layer grup every type crop
const cassava = L.layerGroup();
const baresoil = L.layerGroup();
const crop = L.layerGroup();
const eucalyptus = L.layerGroup();
const forest = L.layerGroup();
const grassland = L.layerGroup();
const paddy = L.layerGroup();
const palm = L.layerGroup();
const rubber = L.layerGroup();
const settlement = L.layerGroup();
const sugarcane = L.layerGroup();
const water = L.layerGroup();

// Event for checkbox 
function checkboxEventListener(checkboxId, layer) {
    document.getElementById(checkboxId).addEventListener('change', function () {
        if (this.checked) {
            layer.addTo(map); // Dislay layer to map
        } else {
            layer.removeFrom(map); // Remove layer
        }
    });
}

// Call the func for every checkbox and layer
checkboxEventListener('point_corn', crop);
checkboxEventListener('point_paddy', paddy);
checkboxEventListener('point_baresoil', baresoil);
checkboxEventListener('point_cassava', cassava);
checkboxEventListener('point_eucalyptus', eucalyptus);
checkboxEventListener('point_forest', forest);
checkboxEventListener('point_grassland', grassland);
checkboxEventListener('point_palm', palm);
checkboxEventListener('point_rubber', rubber);
checkboxEventListener('point_building', settlement);
checkboxEventListener('point_sugarcane', sugarcane);
checkboxEventListener('point_water', water);

// Get data by database tb_crops
$(document).ready(function () {
    $.getJSON('/pointCrop', function (data) {
        // Create object to map the class with icons and groups
        const classToIcon = {
            'Baresoil': { icon: baresoilIcon, group: baresoil },
            'Cassava': { icon: cassavaIcon, group: cassava },
            'Crop': { icon: cropIcon, group: crop },
            'Paddy': { icon: paddyIcon, group: paddy },
            'Eucalyptus': { icon: eucalyptusIcon, group: eucalyptus },
            'Forest': { icon: forestIcon, group: forest },
            'Grassland': { icon: grasslandIcon, group: grassland },
            'Palm': { icon: palmIcon, group: palm },
            'Rubber': { icon: rubberIcon, group: rubber },
            'Settlement': { icon: settlementIcon, group: settlement },
            'Sugarcane': { icon: sugarcaneIcon, group: sugarcane },
            'Water': { icon: waterIcon, group: water }
        };

        // Loop data for all class crop
        $.each(data, function (index) {
            const currentClass = data[index].class;
            // Chek classToIcon through currentClass
            if (classToIcon.hasOwnProperty(currentClass)) {
                // Take icon and grup appropriate
                const icon = classToIcon[currentClass].icon;
                const group = classToIcon[currentClass].group;
                // Create marker with icon appropriate
                const marker = L.marker([parseFloat(data[index].latitude), parseFloat(data[index].longitude)], { icon: icon });
                // Content popup
                const popupContent = `
                <div class="popup-container">
                    <div class="popup-header">Class : ${data[index].class}</div>
                    <div class="popup-phenology">Phase : <span id="phenology-placeholder">Loading...</span></div>
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
                // Add marker to gruplayer appropriate
                marker.addTo(group).bindPopup(popup);
                // Event click marker   
                marker.on('click', function () {
                    const addressPlaceholder = document.getElementById('address-placeholder');
                    const phenologyPlaceholder = document.getElementById('phenology-placeholder');
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

                    // phenology crop
                    const dataPhenology = {
                        point: '[' + data[index].longitude + ',' + data[index].latitude + ']',
                        year: 2023,
                        month: 8
                    }
                    dataPhenology._token = csrfToken;

                    $.ajax({
                        type: 'POST',
                        url: '/phenology_crop',
                        data: JSON.stringify(dataPhenology),
                        contentType: "application/json",
                        success: function (response) {
                            // console.log(response.Phase);
                            const phenology = `${response.Phase}, ${response.Month} ${response.Year}`;
                            phenologyPlaceholder.textContent = phenology;
                        },
                        error: function (error) {
                            console.log("Fail:", error);
                        }
                    })

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
            }
        });
    });
});