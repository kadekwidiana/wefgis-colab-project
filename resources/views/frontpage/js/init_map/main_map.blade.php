{{-- inisialisasi maps --}}
<script>
    // Init
    const _zoom = 10;
    const coorChachoengsao = [13.666790631230649, 101.35322935835381];
    const coorNakhon = [13.93136446765414, 100.086705447267];
    const coorBali = [-8.198517680287658, 115.10051848149178];

    // Initialize the map with the default basemap
    const map = L.map("map", {
        layers: googleHibridMap,
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
            if (layer !== newBasemap) {
                map.removeLayer(layer);
            }
        });
        newBasemap.addTo(map);
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
        });
    });
</script>
