// LAYER GEOSERVER
const baseUrlGeo = 'http://153.92.5.89/geoserver'; //Baseurl geoserver

// Geoserver layerGroup
const chachoengsao_prov = L.layerGroup();
// Nakhon   Polygon / Polyline
const admin_phichit = L.layerGroup();
const agriculture_phichit = L.layerGroup();
const change_phichit = L.layerGroup();
const MS1 = L.layerGroup();
const rail_phichit = L.layerGroup();
const river_NP = L.layerGroup();
const river_polygon_NP = L.layerGroup();
// GO1 Nakhon layer group
const เขื่อนป้องกันตลิ่งนครปฐม_child_2 = L.layerGroup();
const barrage_L_child_3 = L.layerGroup();
const พื้นที่น้ำท่วมนครปฐม_child_4 = L.layerGroup();
const จุดเสี่ยงและจุดเกิดปัญหานครปฐม_child_5 = L.layerGroup();
const bridge_P_child_6 = L.layerGroup();
// G01 Nakhon list layer group
const ผิวดิน_child_1 = L.layerGroup();
const ทิศทางน้ำไหล_child_2 = L.layerGroup();
const แนวคันป้องกันน้ำท่วม_child_3 = L.layerGroup();
const คลองส่งน้ำ_นครปฐม_child_4 = L.layerGroup();
const คลองส่งน้ำ_บางเลน_child_5 = L.layerGroup();
const คลองส่งน้ำ_พนมทวน_child_6 = L.layerGroup();
const คลองส่งน้ำ_พระพิมล_child_7 = L.layerGroup();
const คลองส่งน้ำ_ภาษีเจริญ_child_8 = L.layerGroup();
const คลองส่งน้ำ_นครชุม_child_9 = L.layerGroup();
const คลองส่งน้ำ_กำแพงแสน_child_10 = L.layerGroup();
// G02 Nakhon layer group
const อ่างเก็บน้ำนครปฐม_child_1 = L.layerGroup();
const ประตูน้ำนครปฐม_child_2 = L.layerGroup();
const watergate_P_child_3 = L.layerGroup();
const weir_P_child_4 = L.layerGroup();
const บ่อน้ำนครปฐม_child_5 = L.layerGroup();
const waterplantDLA_P_child_6 = L.layerGroup();
const พื้นที่น้ำเสียนครปฐม_child_7 = L.layerGroup();
const พื้นที่ภัยแล้งนครปฐม_child_8 = L.layerGroup();
const พื้นที่เกษตรกรรมนครปฐม_child_9 = L.layerGroup();
const prototype_P_child_10 = L.layerGroup();
// G03 Nakhon layer group
const จุดกำจัดขยะนครปฐม_child_1 = L.layerGroup();
const solid_waste_trmt_P_child_2 = L.layerGroup();
const จุดบำบัดน้ำเสียนครปฐม_child_3 = L.layerGroup();
const sewage_trmt_P_child_4 = L.layerGroup();
const จุดอพยพนครปฐม_child_5 = L.layerGroup();
const evacuation_P_child_6 = L.layerGroup();
const ตำแหน่งระบบประปานครปฐม_child_7 = L.layerGroup();
const hydro_P_child_8 = L.layerGroup();
const แหล่งท่องเที่ยวนครปฐม_child_9 = L.layerGroup();
const landmark_P_child_10 = L.layerGroup();
const พื้นที่สาธารณะนครปฐม_child_11 = L.layerGroup();

// Func for added WMS layer with configuration
function addWMSToMap(url, layerName, targetLayer) {
    const wms_layer = L.tileLayer.wms(url, {
        layers: layerName,
        format: 'image/png',
        transparent: true,
        attribution: '©GeoServer',
    });
    wms_layer.addTo(targetLayer);
}

// Call func for WMS layer on layer
// CHACHOENGSAO PROVINCE
addWMSToMap(`${baseUrlGeo}/chachoengsao/wms`, 'chachoengsao:prov_chachoengsao', chachoengsao_prov);
// PHICHIT PROVINCE
// polygon and polyline
addWMSToMap(`${baseUrlGeo}/nakhon_poly/wms`, 'nakhon_poly:admin', admin_phichit);
addWMSToMap(`${baseUrlGeo}/nakhon_poly/wms`, 'nakhon_poly:agriculture', agriculture_phichit);
addWMSToMap(`${baseUrlGeo}/nakhon_poly/wms`, 'nnakhon_poly:chang_line', change_phichit);
addWMSToMap(`${baseUrlGeo}/nakhon_poly/wms`, 'nakhon_poly:MS1', MS1);
addWMSToMap(`${baseUrlGeo}/nakhon_poly/wms`, 'nakhon-phatom_province:Rail', rail_phichit);
addWMSToMap(`${baseUrlGeo}/nakhon_poly/wms`, 'nakhon_poly:water_nakhon1', river_NP);
addWMSToMap(`${baseUrlGeo}/nakhon_poly/wms`, 'nakhon_poly:water_nakhon2', river_polygon_NP);
// GO1 url and layer
addWMSToMap(`${baseUrlGeo}/G01_nakhon/wms`, 'G01_nakhon:เขื่อนป้องกันตลิ่งนครปฐม', เขื่อนป้องกันตลิ่งนครปฐม_child_2);
addWMSToMap(`${baseUrlGeo}/G01_nakhon/wms`, 'G01_nakhon:barrage_L_child_3', barrage_L_child_3);
addWMSToMap(`${baseUrlGeo}/G01_nakhon/wms`, 'G01_nakhon:พื้นที่น้ำท่วมนครปฐม_child_4', พื้นที่น้ำท่วมนครปฐม_child_4);
addWMSToMap(`${baseUrlGeo}/G01_nakhon/wms`, 'G01_nakhon:จุดเสี่ยงและจุดเกิดปัญหานครปฐม_child_5', จุดเสี่ยงและจุดเกิดปัญหานครปฐม_child_5);
addWMSToMap(`${baseUrlGeo}/G01_nakhon/wms`, 'G01_nakhon:bridge_P_child_6', bridge_P_child_6);
// G01 Nakhon list url and layer
addWMSToMap(`${baseUrlGeo}/G01_nakhon_list/wms`, 'G01_nakhon_list:ผิวดิน_child_1', ผิวดิน_child_1);
addWMSToMap(`${baseUrlGeo}/G01_nakhon_list/wms`, 'G01_nakhon_list:ทิศทางน้ำไหล_child_2', ทิศทางน้ำไหล_child_2);
addWMSToMap(`${baseUrlGeo}/G01_nakhon_list/wms`, 'G01_nakhon_list:แนวคันป้องกันน้ำท่วม_child_3', แนวคันป้องกันน้ำท่วม_child_3);
addWMSToMap(`${baseUrlGeo}/G01_nakhon_list/wms`, 'G01_nakhon_list:คลองส่งน้ำ_นครปฐม_child_4', คลองส่งน้ำ_นครปฐม_child_4);
addWMSToMap(`${baseUrlGeo}/G01_nakhon_list/wms`, 'G01_nakhon_list:คลองส่งน้ำ_บางเลน_child_5', คลองส่งน้ำ_บางเลน_child_5);
addWMSToMap(`${baseUrlGeo}/G01_nakhon_list/wms`, 'G01_nakhon_list:คลองส่งน้ำ_พนมทวน_child_6', คลองส่งน้ำ_พนมทวน_child_6);
addWMSToMap(`${baseUrlGeo}/G01_nakhon_list/wms`, 'G01_nakhon_list:คลองส่งน้ำ_พระพิมล_child_7', คลองส่งน้ำ_พระพิมล_child_7);
addWMSToMap(`${baseUrlGeo}/G01_nakhon_list/wms`, 'G01_nakhon_list:คลองส่งน้ำ_ภาษีเจริญ_child_8', คลองส่งน้ำ_ภาษีเจริญ_child_8);
addWMSToMap(`${baseUrlGeo}/G01_nakhon_list/wms`, 'G01_nakhon_list:คลองส่งน้ำ_นครชุม_child_9', คลองส่งน้ำ_นครชุม_child_9);
addWMSToMap(`${baseUrlGeo}/G01_nakhon_list/wms`, 'G01_nakhon_list:คลองส่งน้ำ_กำแพงแสน_child_10', คลองส่งน้ำ_กำแพงแสน_child_10);
// G02 url and layer
addWMSToMap(`${baseUrlGeo}/G02_Nakhon/wms`, 'G02_Nakhon:อ่างเก็บน้ำนครปฐม_child_1', อ่างเก็บน้ำนครปฐม_child_1);
addWMSToMap(`${baseUrlGeo}/G02_Nakhon/wms`, 'G02_Nakhon:ประตูน้ำนครปฐม_child_2', ประตูน้ำนครปฐม_child_2);
addWMSToMap(`${baseUrlGeo}/G02_Nakhon/wms`, 'G02_Nakhon:watergate_P_child_3', watergate_P_child_3);
addWMSToMap(`${baseUrlGeo}/G02_Nakhon/wms`, 'G02_Nakhon:weir_P_child_4', weir_P_child_4);
addWMSToMap(`${baseUrlGeo}/G02_Nakhon/wms`, 'G02_Nakhon:บ่อน้ำนครปฐม_child_5', บ่อน้ำนครปฐม_child_5);
addWMSToMap(`${baseUrlGeo}/G02_Nakhon/wms`, 'G02_Nakhon:waterplantDLA_P_child_6', waterplantDLA_P_child_6);
addWMSToMap(`${baseUrlGeo}/G02_Nakhon/wms`, 'G02_Nakhon:พื้นที่น้ำเสียนครปฐม_child_7', พื้นที่น้ำเสียนครปฐม_child_7);
addWMSToMap(`${baseUrlGeo}/G02_Nakhon/wms`, 'G02_Nakhon:พื้นที่ภัยแล้งนครปฐม_child_8', พื้นที่ภัยแล้งนครปฐม_child_8);
addWMSToMap(`${baseUrlGeo}/G02_Nakhon/wms`, 'G02_Nakhon:พื้นที่เกษตรกรรมนครปฐม_child_9', พื้นที่เกษตรกรรมนครปฐม_child_9);
addWMSToMap(`${baseUrlGeo}/G02_Nakhon/wms`, 'G02_Nakhon:prototype_P_child_10', prototype_P_child_10);
// G03 url and layer
addWMSToMap(`${baseUrlGeo}/G03_Nakhon/wms`, 'G03_Nakhon:จุดกำจัดขยะนครปฐม_child_1', จุดกำจัดขยะนครปฐม_child_1);
addWMSToMap(`${baseUrlGeo}/G03_Nakhon/wms`, 'G03_Nakhon:solid_waste_trmt_P_child_2', solid_waste_trmt_P_child_2);
addWMSToMap(`${baseUrlGeo}/G03_Nakhon/wms`, 'G03_Nakhon:จุดบำบัดน้ำเสียนครปฐม_child_3', จุดบำบัดน้ำเสียนครปฐม_child_3);
addWMSToMap(`${baseUrlGeo}/G03_Nakhon/wms`, 'G03_Nakhon:sewage_trmt_P_child_4', sewage_trmt_P_child_4);
addWMSToMap(`${baseUrlGeo}/G03_Nakhon/wms`, 'G03_Nakhon:จุดอพยพนครปฐม_child_5', จุดอพยพนครปฐม_child_5);
addWMSToMap(`${baseUrlGeo}/G03_Nakhon/wms`, 'G03_Nakhon:evacuation_P_child_6', evacuation_P_child_6);
addWMSToMap(`${baseUrlGeo}/G03_Nakhon/wms`, 'G03_Nakhon:ตำแหน่งระบบประปานครปฐม_child_7', ตำแหน่งระบบประปานครปฐม_child_7);
addWMSToMap(`${baseUrlGeo}/G03_Nakhon/wms`, 'G03_Nakhon:hydro_P_child_8', hydro_P_child_8);
addWMSToMap(`${baseUrlGeo}/G03_Nakhon/wms`, 'G03_Nakhon:แหล่งท่องเที่ยวนครปฐม_child_9', แหล่งท่องเที่ยวนครปฐม_child_9);
addWMSToMap(`${baseUrlGeo}/G03_Nakhon/wms`, 'G03_Nakhon:landmark_P_child_10', landmark_P_child_10);
addWMSToMap(`${baseUrlGeo}/G03_Nakhon/wms`, 'G03_Nakhon:พื้นที่สาธารณะนครปฐม_child_11', พื้นที่สาธารณะนครปฐม_child_11);

// List layer and checkbox
const layerCheckboxPairs = [
    // CHACHOENGSAO PROVINCE
    { checkboxId: 'chachoengsao_prov', layer: chachoengsao_prov },
    // NAKHON PROVINCE
    // polygon and polyline
    { checkboxId: 'admin_phichit', layer: admin_phichit },
    { checkboxId: 'agriculture_phichit', layer: agriculture_phichit },
    { checkboxId: 'change_line_phichit', layer: change_phichit },
    { checkboxId: 'MS1_phichit', layer: MS1 },
    { checkboxId: 'rail_phichit', layer: rail_phichit },
    { checkboxId: 'water_river_nakhon', layer: river_NP },
    { checkboxId: 'river_polygon_NP', layer: river_polygon_NP },
    // G01 Nakhon control element
    { checkboxId: 'เขื่อนป้องกันตลิ่งนครปฐม_child_2', layer: เขื่อนป้องกันตลิ่งนครปฐม_child_2 },
    { checkboxId: 'barrage_L_child_3', layer: barrage_L_child_3 },
    { checkboxId: 'พื้นที่น้ำท่วมนครปฐม_child_4', layer: พื้นที่น้ำท่วมนครปฐม_child_4 },
    { checkboxId: 'จุดเสี่ยงและจุดเกิดปัญหานครปฐม_child_5', layer: จุดเสี่ยงและจุดเกิดปัญหานครปฐม_child_5 },
    { checkboxId: 'bridge_P_child_6', layer: bridge_P_child_6 },
    // G01 Nakhon list control element
    { checkboxId: 'ผิวดิน_child_1', layer: ผิวดิน_child_1 },
    { checkboxId: 'ทิศทางน้ำไหล_child_2', layer: ทิศทางน้ำไหล_child_2 },
    { checkboxId: 'แนวคันป้องกันน้ำท่วม_child_3', layer: แนวคันป้องกันน้ำท่วม_child_3 },
    { checkboxId: 'คลองส่งน้ำ_นครปฐม_child_4', layer: คลองส่งน้ำ_นครปฐม_child_4 },
    { checkboxId: 'คลองส่งน้ำ_บางเลน_child_5', layer: คลองส่งน้ำ_บางเลน_child_5 },
    { checkboxId: 'คลองส่งน้ำ_พนมทวน_child_6', layer: คลองส่งน้ำ_พนมทวน_child_6 },
    { checkboxId: 'คลองส่งน้ำ_พระพิมล_child_7', layer: คลองส่งน้ำ_พระพิมล_child_7 },
    { checkboxId: 'คลองส่งน้ำ_ภาษีเจริญ_child_8', layer: คลองส่งน้ำ_ภาษีเจริญ_child_8 },
    { checkboxId: 'คลองส่งน้ำ_นครชุม_child_9', layer: คลองส่งน้ำ_นครชุม_child_9 },
    { checkboxId: 'คลองส่งน้ำ_กำแพงแสน_child_10', layer: คลองส่งน้ำ_กำแพงแสน_child_10 },
    // G02 Nakhon control element
    { checkboxId: 'อ่างเก็บน้ำนครปฐม_child_1', layer: อ่างเก็บน้ำนครปฐม_child_1 },
    { checkboxId: 'ประตูน้ำนครปฐม_child_2', layer: ประตูน้ำนครปฐม_child_2 },
    { checkboxId: 'watergate_P_child_3', layer: watergate_P_child_3 },
    { checkboxId: 'weir_P_child_4', layer: weir_P_child_4 },
    { checkboxId: 'บ่อน้ำนครปฐม_child_5', layer: บ่อน้ำนครปฐม_child_5 },
    { checkboxId: 'waterplantDLA_P_child_6', layer: waterplantDLA_P_child_6 },
    { checkboxId: 'พื้นที่น้ำเสียนครปฐม_child_7', layer: พื้นที่น้ำเสียนครปฐม_child_7 },
    { checkboxId: 'พื้นที่ภัยแล้งนครปฐม_child_8', layer: พื้นที่ภัยแล้งนครปฐม_child_8 },
    { checkboxId: 'พื้นที่เกษตรกรรมนครปฐม_child_9', layer: พื้นที่เกษตรกรรมนครปฐม_child_9 },
    { checkboxId: 'prototype_P_child_10', layer: prototype_P_child_10 },
    // G03 Nakhon control element
    { checkboxId: 'จุดกำจัดขยะนครปฐม_child_1', layer: จุดกำจัดขยะนครปฐม_child_1 },
    { checkboxId: 'solid_waste_trmt_P_child_2', layer: solid_waste_trmt_P_child_2 },
    { checkboxId: 'จุดบำบัดน้ำเสียนครปฐม_child_3', layer: จุดบำบัดน้ำเสียนครปฐม_child_3 },
    { checkboxId: 'sewage_trmt_P_child_4', layer: sewage_trmt_P_child_4 },
    { checkboxId: 'จุดอพยพนครปฐม_child_5', layer: จุดอพยพนครปฐม_child_5 },
    { checkboxId: 'evacuation_P_child_6', layer: evacuation_P_child_6 },
    { checkboxId: 'ตำแหน่งระบบประปานครปฐม_child_7', layer: ตำแหน่งระบบประปานครปฐม_child_7 },
    { checkboxId: 'hydro_P_child_8', layer: hydro_P_child_8 },
    { checkboxId: 'แหล่งท่องเที่ยวนครปฐม_child_9', layer: แหล่งท่องเที่ยวนครปฐม_child_9 },
    { checkboxId: 'landmark_P_child_10', layer: landmark_P_child_10 },
    { checkboxId: 'พื้นที่สาธารณะนครปฐม_child_11', layer: พื้นที่สาธารณะนครปฐม_child_11 },
];

function addGeoToMap(checkboxId, layerGrup) {
    if ($(`#${checkboxId}`).is(':checked')) {
        layerGrup.addTo(map);
    }
}
addGeoToMap('admin_phichit', admin_phichit);
addGeoToMap('agriculture_phichit', agriculture_phichit);
// addGeoToMap('change_line_phichit', change_phichit);
// addGeoToMap('MS1_phichit', MS1);
// addGeoToMap('rail_phichit', rail_phichit);
addGeoToMap('water_river_nakhon', river_NP);
addGeoToMap('river_polygon_NP', river_polygon_NP);

// Func for set display layer based on checkbox
function handleLayerCheckboxChange(checkbox, layer) {
    if (checkbox.checked) {
        layer.addTo(map); // Add layer to map
    } else {
        layer.removeFrom(map); // Remove layer
    }
}

// Event listener for status change checkbox
layerCheckboxPairs.forEach(function (pair) {
    const checkbox = document.getElementById(pair.checkboxId);
    checkbox.addEventListener('change', function () {
        // When status checkbox changed, call func handleLayerCheckboxChange()
        handleLayerCheckboxChange(checkbox, pair.layer);
    });
});