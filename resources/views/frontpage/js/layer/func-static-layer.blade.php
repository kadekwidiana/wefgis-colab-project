<script type="module">
    const geoJsonLayers = {};
    // layer group untuk mengelola layer dari static data
    const layerGroup = L.layerGroup().addTo(map);

    // Fungsi fetch GeoJSON yang sudah dibuat sebelumnya
    const fetchDataGeoJson = async (dataSpatial, layer) => {
        try {
            console.log(`Fetching data for: ${dataSpatial}`);
            if (geoJsonLayers[dataSpatial]) {
                // Jika layer sudah ada, langsung tambahkan ke layerGroup
                layer.addLayer(geoJsonLayers[dataSpatial]);
                return;
            }

            // Fetch GeoJSON data
            const response = await axios.get(`/resources/layer/${dataSpatial}.geojson`);
            // console.log('Fetching GeoJSON from URL:', `/resources/layer/${dataSpatial}.geojson`);
            const geojsonData = response.data;

            // Buat GeoJSON layer dan tambahkan ke map
            const geoJsonLayer = L.geoJSON(geojsonData, {
                style: (feature) => {
                    return {
                        color: 'green',
                        weight: 2,
                        opacity: 1
                    };
                },
            }).addTo(layer);

            // Simpan referensi layer agar bisa digunakan lagi
            geoJsonLayers[dataSpatial] = geoJsonLayer;

        } catch (error) {
            if (error.response) {
                console.error(`Error fetching GeoJSON: ${error.response.status} - ${error.response.data.error}`);
            } else {
                console.error(`Error fetching GeoJSON: ${error.message}`);
            }
        }
    };

    // Fungsi untuk setup checkbox dengan layer GeoJSON
    function setupCheckbox(dataSpatial, checkboxId, mapLayer) {
        const checkbox = document.getElementById(checkboxId);
        // console.log(`Setting up checkbox for: ${dataSpatial}`);
        checkbox.addEventListener('change', function() {
            if (this.checked) {
                // Jika checkbox aktif, fetch GeoJSON dan tambahkan ke layer
                fetchDataGeoJson(dataSpatial, mapLayer);
            } else {
                // Jika checkbox nonaktif, hapus layer dari peta
                if (geoJsonLayers[dataSpatial]) {
                    mapLayer.removeLayer(geoJsonLayers[dataSpatial]);
                    delete geoJsonLayers[dataSpatial]; // Hapus referensi layer
                }
            }
        });
    }

    // Setup checkbox untuk setiap layer
    setupCheckbox("paddy", 'checkboxId_paddy', layerGroup);
    setupCheckbox("baresoil", 'checkboxId_baresoil', layerGroup);
    setupCheckbox("cassava", 'checkboxId_cassava', layerGroup);
    setupCheckbox("settlement", 'checkboxId_settlement', layerGroup);
    setupCheckbox("sugarcane", 'checkboxId_sugarcane', layerGroup);
    setupCheckbox("water", 'checkboxId_water', layerGroup);
    setupCheckbox("polygons_data", 'checkboxId_polygons', layerGroup);
    setupCheckbox("all_classess", 'checkboxId_all_class', layerGroup);
</script>
