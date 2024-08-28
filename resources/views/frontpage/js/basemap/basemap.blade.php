<script>
    // List Basemap
    const openStreetMap = L.tileLayer(
        "https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
            attribution: "©OpenStreetMap Contributors|",
        }
    );

    const googleStreetMap = L.tileLayer(
        "http://{s}.google.com/vt?lyrs=m&x={x}&y={y}&z={z}", {
            attribution: "©Google StreetMap",
            subdomains: ["mt0", "mt1", "mt2", "mt3"],
            maxZoom: 20,
        }
    );

    const satelliteMap = L.tileLayer(
        "https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}", {
            attribution: "©Google Satellite Map",
            subdomains: ["mt0", "mt1", "mt2", "mt3"],
            maxZoom: 20,
        }
    );

    const googleHibridMap = L.tileLayer(
        "http://{s}.google.com/vt?lyrs=s,h&x={x}&y={y}&z={z}", {
            attribution: "©Google Hybrid Map",
            subdomains: ["mt0", "mt1", "mt2", "mt3"],
            maxZoom: 20,
        }
    );

    const googleTerrain = L.tileLayer(
        "https://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}", {
            maxZoom: 20,
            subdomains: ["mt0", "mt1", "mt2", "mt3"],
            attribution: "©Google Terrain",
        }
    );

    const googleTraffic = L.tileLayer(
        "http://{s}.google.com/vt/lyrs=m,traffic&hl=en&x={x}&y={y}&z={z}&s=Ga", {
            maxZoom: 20,
            subdomains: ["mt0", "mt1", "mt2", "mt3"],
            attribution: "©Google Traffic",
        }
    );

    const openTopoMap = L.tileLayer(
        "https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png", {
            attribution: "©OpenTopoMap Contributors",
        }
    );
    const esriSatelite = L.tileLayer(
        "https://server.arcgisonline.com/ArcGIS/rest/services/World_Imagery/MapServer/tile/{z}/{y}/{x}", {
            attribution: '©<a href="https://www.esri.com">Esri Satelite</a>',
            subdomains: ["mt0", "mt1", "mt2", "mt3"],
            maxZoom: 20,
        }
    );
    const esriWorldStreetMap = L.tileLayer(
        "https://server.arcgisonline.com/ArcGIS/rest/services/World_Street_Map/MapServer/tile/{z}/{y}/{x}", {
            attribution: '©<a href="https://www.esri.com">Esri Street</a>',
            subdomains: ["mt0", "mt1", "mt2", "mt3"],
            maxZoom: 20,
        }
    );
    const googleEarth = L.tileLayer(
        "https://storage.googleapis.com/global-surface-water/tiles2021/transitions/{z}/{x}/{y}.png", {
            attribution: '©<a href="https://www.thunderforest.com/maps/landscape/">Thunderforest</a>',
        }
    );

    //basemap Google Maps Label
    const googleMapsLabel = L.tileLayer(
        "https://earthengine.googleapis.com/v1/projects/earthengine-legacy/maps/6e20dcda0306d1612c1c93896fabf4bd-3812d50f5e3a412f3e1a16d9f1970210/tiles/%7Bz%7D/%7Bx%7D/%7By%7D", {
            attribution: '©<a href="https://www.google.com/maps">Google Maps Label</a>',
        }
    );
</script>
