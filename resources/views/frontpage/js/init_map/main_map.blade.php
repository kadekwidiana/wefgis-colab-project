{{-- inisialisasi maps --}}
<script>
    // Init
    const _zoom = 10;
    const coorChachoengsao = [13.666790631230649, 101.35322935835381];
    const coorNakhon = [13.93136446765414, 100.086705447267];
    const coorBali = [-8.198517680287658, 115.10051848149178];
    const jakarta = [-6.200000, 106.816666]

    // Initialize the map with the default basemap
    const map = L.map("map", {
        layers: [googleHibridMap],
        center: coorChachoengsao,
        zoom: _zoom,
        minZoom: 3,
        zoomControl: false,
    });

    // Atur posisi maps dan tampilan layer pada control layer
    function handlePosition() {
        // Event listener for radio input select layer Chachoengsao and Nakhon
        const radioInputs = document.querySelectorAll('input[name="select_layer"]');
        radioInputs.forEach((input) => {
            input.addEventListener("change", function() {
                // Get the selected layer value
                const selectedLayer = this.value;
                @foreach ($regencies as $regency)
                    if (selectedLayer === '{{ $regency->regency }}') {
                        $("#layer_{{ $regency->regency_id }}").removeClass("d-none");
                        map.setView([{{ $regency->center_coor }}], _zoom);
                    } else if (selectedLayer !== '{{ $regency->regency }}') {
                        $("#layer_{{ $regency->regency_id }}").addClass("d-none");
                    }
                @endforeach
            });
        });
    }
    handlePosition();

    // Func for set visible layer Google Maps Label based checkbox selected
    function updateGoogleMapsLabelVisibility() {
        if (document.getElementById("googleMapsLabel").checked) {
            map.addLayer(googleMapsLabel);
        } else {
            map.removeLayer(googleMapsLabel);
        }
    }
    // Event listener for active function while checkbox change
    document
        .getElementById("googleMapsLabel")
        .addEventListener("change", updateGoogleMapsLabelVisibility);

    // Fungsi untuk mengganti basemap
    // Func for change selected basemap
    function changeBasemap(newBasemap) {
        map.eachLayer(function(layer) {
            if (layer !== newBasemap && layer !== markersLayer) {
                map.removeLayer(layer);
            }
        });
        newBasemap.addTo(map);
        markersLayer.addTo(map); // Add markers layer back after changing the basemap
    }

    // List option basemap and id element input related in HTML
    const basemapOptions = [{
            name: "openStreetMap",
            layer: openStreetMap
        },
        {
            name: "googleStreetMap",
            layer: googleStreetMap
        },
        {
            name: "satelliteMap",
            layer: satelliteMap
        },
        {
            name: "googleHibridMap",
            layer: googleHibridMap
        },
        {
            name: "googleTerrain",
            layer: googleTerrain
        },
        {
            name: "googleTraffic",
            layer: googleTraffic
        },
        {
            name: "openTopoMap",
            layer: openTopoMap
        },
        {
            name: "esriWorldStreetMap",
            layer: esriWorldStreetMap
        },
        {
            name: "esriSatelite",
            layer: esriSatelite
        },
        {
            name: "googleEarth",
            layer: googleEarth
        },
    ];

    // Layer to hold the markers
    const markersLayer = L.layerGroup().addTo(map);

    // Loop for added eventlistener to every input in HTML
    basemapOptions.forEach(function(option) {
        document
            .querySelector('input[value="' + option.name + '"]')
            .addEventListener("change", function() {
                changeBasemap(option.layer);
            });
    });

    // Selected all image basemap in HTML
    const basemapImages = document.querySelectorAll(".sidebar-basemap img");
    // Add eventlistener on every basemap image
    basemapImages.forEach(function(image) {
        image.addEventListener("click", function() {
            const radio = this.closest("label").querySelector(
                'input[type="radio"]'
            );
            radio.checked = true;

            const selectedBasemap = radio.value;

            // Remove basemap was not selected
            basemapOptions.forEach(function(option) {
                if (option.name !== selectedBasemap) {
                    map.removeLayer(option.layer);
                }
            });

            // Condition and add basemap was selected
            switch (selectedBasemap) {
                case "openStreetMap":
                    openStreetMap.addTo(map);
                    break;
                case "googleStreetMap":
                    googleStreetMap.addTo(map);
                    break;
                case "satelliteMap":
                    satelliteMap.addTo(map);
                    break;
                case "googleHibridMap":
                    googleHibridMap.addTo(map);
                    break;
                case "googleTerrain":
                    googleTerrain.addTo(map);
                    break;
                case "googleTraffic":
                    googleTraffic.addTo(map);
                    break;
                case "openTopoMap":
                    openTopoMap.addTo(map);
                    break;
                case "esriWorldStreetMap":
                    esriWorldStreetMap.addTo(map);
                    break;
                case "esriSatelite":
                    esriSatelite.addTo(map);
                    break;
                case "googleEarth":
                    googleEarth.addTo(map);
                    break;
                default:
                    break;
            }
            markersLayer.addTo(map); // Add markers layer back after changing the basemap
        });
    });


    // Fungsi untuk menambahkan marker dan data WAQI
    let allMarkers = {};

    function populateMarkers(map, bounds) {
        return fetch(
                "https://api.waqi.info/v2/map/bounds/?latlng=" +
                bounds +
                "&token=cd00d6f6879c325eba31aba5fd5c597b51bcb24b"
            )
            .then((x) => x.json())
            .then((stations) => {
                if (stations.status != "ok") throw stations.data;


                stations.data.forEach((station) => {
                    if (allMarkers[station.uid])
                        markersLayer.removeLayer(allMarkers[station.uid]);

                    let iw = 83,
                        ih = 107;
                    let icon = L.icon({
                        iconUrl: "https://waqi.info/mapicon/" + station.aqi + ".30.png",
                        iconSize: [iw / 2, ih / 2],
                        iconAnchor: [iw / 4, ih / 2 - 5],
                    });

                    let marker = L.marker([station.lat, station.lon], {
                        zIndexOffset: station.aqi,
                        title: station.station.name,
                        idx: station.idx,
                        icon: icon,
                    }).addTo(markersLayer);

                    marker.on("click", () => {
                        let popup = L.popup()
                            .setLatLng([station.lat, station.lon])
                            .setContent(station.station.name)
                            .openOn(map);

                        getMarkerPopup(station.uid).then((info) => {
                            // console.log(station.uid);
                            popup.setContent(info);
                        });
                    });

                    allMarkers[station.uid] = marker;
                });

                document.getElementById("leaflet-map-error").style.display = "none";
                return stations.data.map(
                    (station) => new L.LatLng(station.lat, station.lon)
                );
            })
            .catch((e) => {
                var o = document.getElementById("leaflet-map-error");
                o.innerHTML = "Sorry...." + e;
                o.style.display = "";
            });
    }

    function populateAndFitMarkers(map, bounds) {
        removeMarkers(map);
        if (bounds.split(",").length == 2) {
            let [lat, lng] = bounds.split(",");
            lat = parseFloat(lat);
            lng = parseFloat(lng);
            bounds = `${lat - 0.5},${lng - 0.5},${lat + 0.5},${lng + 0.5}`;
        }
        populateMarkers(map, bounds).then((markerBounds) => {
            let [lat1, lng1, lat2, lng2] = bounds.split(",");
            let mapBounds = L.latLngBounds(
                L.latLng(lat2, lng2),
                L.latLng(lat1, lng1)
            );
            map.fitBounds(mapBounds, {
                maxZoom: 12,
                paddingTopLeft: [0, 40]
            });
        });
    }

    function removeMarkers(map) {
        markersLayer.clearLayers();
        allMarkers = {};
    }

    function getMarkerPopup(markerUID) {
        // console.log(markerUID);
        return getMarkerAQI(markerUID).then((marker) => {
            console.log(marker);
            let info = marker.city.name +
                ": AQI " + marker.aqi +
                " updated on " + new Date(marker.time.v * 1000).toLocaleTimeString() + "<br>";

            if (marker.city.location) {
                info += "<b>Location</b>: ";
                info += "<small>" + marker.city.location + "</small><br>";
            }

            let pollutants = ["pm25", "pm10", "o3", "no2", "so2", "co"];

            info += "<b>Pollutants</b>: ";
            for (let specie in marker.iaqi) {
                if (pollutants.indexOf(specie) >= 0)
                    info += "<u>" + specie + "</u>:" + marker.iaqi[specie].v + " ";
            }
            info += "<br>";

            info += "<b>Weather</b>: ";
            for (let specie in marker.iaqi) {
                if (pollutants.indexOf(specie) < 0)
                    info += "<u>" + specie + "</u>:" + marker.iaqi[specie].v + " ";
            }
            info += "<br>";

            info += "<b>Attributions</b>: <small>";
            info += marker.attributions
                .map(
                    (attribution) =>
                    "<a target=_ href='" +
                    attribution.url +
                    "'>" +
                    attribution.name +
                    "</a>"
                )
                .join(" - ");
            info += "</small><br>";

            // Add canvas for chart
            info += `<canvas id="chart-${markerUID}" width="400" height="200"></canvas>`;

            // Check if forecast data is available
            if (marker.forecast && marker.forecast.daily && marker.forecast.daily.pm25) {
                setTimeout(() => {
                    let ctx = document.getElementById(`chart-${markerUID}`).getContext('2d');
                    let forecastData = marker.forecast.daily.pm25;
                    let labels = forecastData.map(item => item.day);
                    let data = forecastData.map(item => item.avg);

                    new Chart(ctx, {
                        type: 'line',
                        data: {
                            labels: labels,
                            datasets: [{
                                label: 'PM2.5 Forecast',
                                data: data,
                                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                                borderColor: 'rgba(255, 99, 132, 1)',
                                borderWidth: 1
                            }]
                        },
                        options: {
                            scales: {
                                y: {
                                    beginAtZero: true
                                }
                            }
                        }
                    });
                }, 100);
            } else {
                // If forecast data is not available, display a message
                setTimeout(() => {
                    let ctx = document.getElementById(`chart-${markerUID}`).getContext('2d');
                    ctx.font = "16px Arial";
                    ctx.fillText("Forecast data not available", 50, 100);
                }, 100);
            }
            return info;
        });
    }


    function getMarkerAQI(markerUID) {
        return fetch(
                "https://api.waqi.info/feed/@" + markerUID + "/?token=cd00d6f6879c325eba31aba5fd5c597b51bcb24b"
            )
            .then((x) => x.json())
            .then((data) => {
                if (data.status != "ok") throw data.reason;
                // console.log(data.data);
                return data.data;
            });
    }

    const locations = {
        Jakarta: "-6.200000,106.816666",
        // Add more locations as needed
    };

    let oldButton;

    function addLocationButton(location, bounds) {
        let button = document.createElement("div");
        button.classList.add("ui", "button", "tiny");
        document.getElementById("leaflet-locations").appendChild(button);
        button.innerHTML = location;
        let activate = () => {
            populateAndFitMarkers(map, bounds);
            if (oldButton) oldButton.classList.remove("primary");
            button.classList.add("primary");
            oldButton = button;
        };
        button.onclick = activate;
        return activate;
    }

    Object.keys(locations).forEach((location, idx) => {
        let bounds = locations[location];
        let activate = addLocationButton(location, bounds);
        if (idx == 0) activate();
    });

    fetch("https://api.waqi.info/v2/feed/here/?token=cd00d6f6879c325eba31aba5fd5c597b51bcb24b")
        .then((x) => x.json())
        .then((x) => {
            addLocationButton(x.data.city.name, x.data.city.geo.join(","));
        });
</script>
