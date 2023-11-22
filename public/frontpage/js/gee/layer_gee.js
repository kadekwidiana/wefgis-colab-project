// DATA FROM Google Eart Engine API
// Init object for save id HTML, mapKey response, layerGroup, and tileLayer
const layersConfig1 = {
    // GEE Chachoengsao
    ChangeIntensity: {
        // id in html
        id: 'change_intensity',
        // mapKey response API
        mapKey: 'ChangeIntensity',
        // layerGroup for save data.map response API
        layerGroup: L.layerGroup(),
        // tileLayer for url map from response API
        tileLayer: null,
    },
    IGBP: {
        id: 'igbp',
        mapKey: 'IGBP',
        layerGroup: L.layerGroup(),
        tileLayer: null,
    },
    LST: {
        id: 'lst',
        mapKey: 'LST',
        layerGroup: L.layerGroup(),
        tileLayer: null,
    },
    Occurrence: {
        id: 'occurrence',
        mapKey: 'Occurrence',
        layerGroup: L.layerGroup(),
        tileLayer: null,
    },
    Water: {
        id: 'water',
        mapKey: 'Chachoengsao',
        layerGroup: L.layerGroup(),
        tileLayer: null,
    },
    WaterSeason: {
        id: 'water_season',
        mapKey: 'WaterSeason',
        layerGroup: L.layerGroup(),
        tileLayer: null,
    },
};

const layersConfig2 = {
    // GEE Nakhon Pathom
    AdminNakhon: {
        id: 'nakhon_admin',
        mapKey: 'nakhon_admin',
        layerGroup: L.layerGroup(),
        tileLayer: null,
    },
    AgricultureNakhon: {
        id: 'nakhon_agriculture',
        mapKey: 'nakhon_agriculture',
        layerGroup: L.layerGroup(),
        tileLayer: null,
    },
    ChangeNakhon: {
        id: 'nakhon_change',
        mapKey: 'nakhon_change',
        layerGroup: L.layerGroup(),
        tileLayer: null,
    },
    MsiNakhon: {
        id: 'nakhon_msi',
        mapKey: 'nakhon_msi',
        layerGroup: L.layerGroup(),
        tileLayer: null,
    },
    RailNakhon: {
        id: 'nakhon_rail',
        mapKey: 'nakhon_rail',
        layerGroup: L.layerGroup(),
        tileLayer: null,
    },
}

const layersConfig3 = {
    // Water
    ChangeIntensity2: {
        id: 'ChangeIntensity',
        mapKey: 'ChangeIntensity',
        layerGroup: L.layerGroup(),
        tileLayer: null,
    },
    Occurrence2: {
        id: 'Occurrence',
        mapKey: 'Occurrence',
        layerGroup: L.layerGroup(),
        tileLayer: null,
    },
    Transition2: {
        id: 'Transition',
        mapKey: 'Transition',
        layerGroup: L.layerGroup(),
        tileLayer: null,
    },
    WaterSeason2: {
        id: 'WaterSeason',
        mapKey: 'WaterSeason',
        layerGroup: L.layerGroup(),
        tileLayer: null,
    },
}

// Func for make tileLayer and added to layerGroup
function createAndAddTileLayer(mapKey, layerGroup, url, layersConfig) {
    const tileLayer = L.tileLayer(url, {
        attribution: '©Google Earth Engine Contributors'
    });
    tileLayer.addTo(layerGroup);
    layersConfig[mapKey].tileLayer = tileLayer;
}

// Func for handle status change checkbox
function handleCheckboxChange(mapKey, layersConfig) {
    // Get layerGroup and tileLayer
    const { layerGroup, tileLayer } = layersConfig[mapKey];
    // List for display legend when checkbox cheked
    const visibleKeys = ['ChangeIntensity', 'IGBP', 'LST', 'Occurrence', 'WaterSeason', 'Transition'];
    return function () {
        if (this.checked) {
            layerGroup.addTo(map); //Add layer to map
            // console.log(layersConfig[mapKey].mapKey)
            // if (visibleKeys.includes(layersConfig[mapKey].mapKey)) {
            //     // $('#c-gee').removeClass('d-none');
            // }
        } else {
            // $('#c-gee').addClass('d-none');
            layerGroup.removeFrom(map); //Remove layer
        }
    };
}
// ASYNC
// Get data and create layer when the page loads
async function fetchDataAndCreateLayers(url, layersConfig, handleCheckboxChange) {
    try {
        const data = await $.getJSON(url);
        console.log(data);
        // [] for save promises create layer
        const promises = [];
        // Iterate through the configuration of the layers
        for (const mapKey in layersConfig) {
            // Url layer from data
            const url = data.map[layersConfig[mapKey].mapKey];
            // Create and add tile layers to layer groups
            promises.push(createAndAddTileLayer(mapKey, layersConfig[mapKey].layerGroup, url, layersConfig));
            // Added event listeners for checkboxes associated with layers
            document.getElementById(layersConfig[mapKey].id).addEventListener('change', handleCheckboxChange(mapKey, layersConfig));
        }
        // Wait for all promises to complete before continuing
        await Promise.all(promises);
    } catch (error) {
        // Handle error
        console.error("Error:", error);
    }
}

// Ambil data saat halaman dimuat
// function fetchDataAndCreateLayers(url, layersConfig, handleCheckboxChange) {
//     $.getJSON(url, function (data) {
//         console.log(data);
//         for (const mapKey in layersConfig) {
//             const url = data.map[layersConfig[mapKey].mapKey];
//             createAndAddTileLayer(mapKey, layersConfig[mapKey].layerGroup, url, layersConfig);
//             document.getElementById(layersConfig[mapKey].id).addEventListener('change', handleCheckboxChange(mapKey, layersConfig));
//         }
//     }).fail(function (jqXHR, textStatus, error) {
//         // console.log("Error: " + error);
//     });
// }

// Dokumen ready
$(document).ready(function () {
    // Call fetchDataAndCreateLayers() for URL different layers and appropriate layer configurations
    fetchDataAndCreateLayers("/wateroccurence", layersConfig1, handleCheckboxChange);
    fetchDataAndCreateLayers("/nakhonmap", layersConfig2, handleCheckboxChange);
    fetchDataAndCreateLayers("/nakhonwater", layersConfig3, handleCheckboxChange);
});