<!-- Sidebar basemap -->
<div class="container sidebar-basemap bg-white mt-0" id="sidebar-basemap">
    <h5 class="text-center">Basemap</h5>
    <div class="border mb-2"></div>
    <div class="row">
        <div class="col-md-6">
            <div class="form-check">
                <input class="form-check-input border border-secondary" type="checkbox" value="" id="googleMapsLabel"
                    data-layer="google_label">
                <label class="form-check-label" for="googleMapsLabel">
                    Label
                </label>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="basemap-options">
                <label>
                    <img src="frontpage/assets/icons/icon-basemap/openstreetmap_blackandwhite.png" alt="OpenStreetMap"
                        class="img-fluid custom-image-basemap">
                    <input class="form-check-input" type="radio" name="basemap" value="openStreetMap">
                    OSM
                </label>
                <label>
                    <img src="frontpage/assets/icons/icon-basemap/google-streets.png" alt="GoogleStreetMap"
                        class="img-fluid custom-image-basemap">
                    <input class="form-check-input" type="radio" name="basemap" value="googleStreetMap">
                    Street
                </label>

            </div>
        </div>

        <div class="col-md-6">
            <div class="basemap-options">
                <label>
                    <img src="frontpage/assets/icons/icon-basemap/here_satelliteday.png" alt="Satellite "
                        class="img-fluid custom-image-basemap">
                    <input class="form-check-input" type="radio" name="basemap" value="satelliteMap">
                    G-Satelite
                </label>
                <label>
                    <img src="frontpage/assets/icons/icon-basemap/google-hibrid.png" alt="Satellite "
                        class="img-fluid custom-image-basemap">
                    <input class="form-check-input" type="radio" name="basemap" value="googleHibridMap" checked>
                    Hibrid
                </label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="basemap-options">
                <label>
                    <img src="frontpage/assets/icons/icon-basemap/google-terrain.png" alt="Terain "
                        class="img-fluid custom-image-basemap">
                    <input class="form-check-input" type="radio" name="basemap" value="googleTerrain">
                    Terrain
                </label>
            </div>
        </div>
        <div class="col-md-6">
            <div class="basemap-options">
                <label>
                    <img src="frontpage/assets/icons/icon-basemap/google-traffic.png" alt="Traffic "
                        class="img-fluid custom-image-basemap">
                    <input class="form-check-input" type="radio" name="basemap" value="googleTraffic">
                    Traffic
                </label>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6">
            <div class="basemap-options">
                <label>
                    <img src="frontpage/assets/icons/icon-basemap/esri-street.png" alt="Esri"
                        class="img-fluid custom-image-basemap">
                    <input class="form-check-input" type="radio" name="basemap" value="esriWorldStreetMap">
                    Esri Street
                </label>
                <label>
                    <img src="frontpage/assets/icons/icon-basemap/topo-map.png" alt="OpenTopoMap"
                        class="img-fluid custom-image-basemap">
                    <input class="form-check-input" type="radio" name="basemap" value="openTopoMap">
                    TopoMap
                </label>

            </div>
        </div>

        <div class="col-md-6">
            <div class="basemap-options mb-4">
                <label>
                    <img src="frontpage/assets/icons/icon-basemap/esri-satelite.png" alt="Esri "
                        class="img-fluid custom-image-basemap">
                    <input class="form-check-input" type="radio" name="basemap" value="esriSatelite">
                    E-Satelite
                </label>
                <label>
                    <img src="frontpage/assets/icons/icon-basemap/google-earth.png" alt="Thunderforest "
                        class="img-fluid custom-image-basemap">
                    <input class="form-check-input" type="radio" name="basemap" value="googleEarth">
                    Earth
                </label>
            </div>
        </div>
    </div>
</div>

<!-- Sidebar layer -->
<div class="container sidebar-layer bg-white mt-0 pb-5" id="sidebar-layer">
    <div class="h6 text-dark">
        <input name="select_layer" class="form-check-input border border-secondary" type="radio"
            value="chachoengsao" id="select_layer_chachoengsao" data-layer="select_layer" checked>
        <strong>Chachoengsao</strong>
    </div>
    <div class="h6 text-dark">
        <input name="select_layer" class="form-check-input border border-secondary" type="radio" value="nakhon"
            id="select_layer_nakhon" data-layer="select_layer">
        <strong>Nakhon Pathom</strong>
    </div>
    <div class="border mb-2"></div>
    <div class="col pb-4">
        {{-- LAYER CHACHOENGSAO --}}
        <div id="layer_chachoengsao" class="">
            <div class="border rounded">
                <!-- <div class="border-top"></div> -->
                <p class="bg-secondary p-2 m-0 rounded-top fw-bold d-flex">
                    <a class="text-decoration-none text-white" data-bs-toggle="collapse" href="#crop_chachoengaso"
                        role="button" aria-expanded="false" aria-controls="crop_chachoengaso">Crop Chachoengsao
                        <i class="fas fa-angle-down text-white"></i>
                    </a>
                </p>
                <div id="crop_chachoengaso" class="collapse">
                    <div class="p-2">
                        <div class="form-check">
                            <input name="corn" class="form-check-input border border-secondary" type="checkbox"
                                value="" id="point_corn" data-layer="corn">
                            <label class="form-check-label" for="point_corn">
                                Corn
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="paddy" class="form-check-input border border-secondary" type="checkbox"
                                value="" id="point_paddy" data-layer="paddy">
                            <label class="form-check-label" for="point_paddy">
                                Paddy
                            </label>
                        </div>

                        <div class="form-check">
                            <input name="baresoil" class="form-check-input border border-secondary" type="checkbox"
                                value="" id="point_baresoil" data-layer="baresoil">
                            <label class="form-check-label" for="point_baresoil">
                                Baresoil
                            </label>
                        </div>

                        <div class="form-check">
                            <input name="cassava" class="form-check-input border border-secondary" type="checkbox"
                                value="" id="point_cassava" data-layer="cassava">
                            <label class="form-check-label" for="point_cassava">
                                Cassava
                            </label>
                        </div>

                        <div class="form-check">
                            <input name="eucalyptus" class="form-check-input border border-secondary" type="checkbox"
                                value="" id="point_eucalyptus" data-layer="eucalyptus">
                            <label class="form-check-label" for="point_eucalyptus">
                                Eucalyptus
                            </label>
                        </div>

                        <div class="form-check">
                            <input name="forest" class="form-check-input border border-secondary" type="checkbox"
                                value="" id="point_forest" data-layer="forest">
                            <label class="form-check-label" for="point_forest">
                                Forest
                            </label>
                        </div>

                        <div class="form-check">
                            <input name="grassland" class="form-check-input border border-secondary" type="checkbox"
                                value="" id="point_grassland" data-layer="grassland">
                            <label class="form-check-label" for="point_grassland">
                                Grassland
                            </label>
                        </div>

                        <div class="form-check">
                            <input name="palm" class="form-check-input border border-secondary" type="checkbox"
                                value="" id="point_palm" data-layer="palm">
                            <label class="form-check-label" for="point_palm">
                                Palm
                            </label>
                        </div>

                        <div class="form-check">
                            <input name="rubber" class="form-check-input border border-secondary" type="checkbox"
                                value="" id="point_rubber" data-layer="rubber">
                            <label class="form-check-label" for="point_rubber">
                                Rubber
                            </label>
                        </div>

                        <div class="form-check">
                            <input name="building" class="form-check-input border border-secondary" type="checkbox"
                                value="" id="point_building" data-layer="building">
                            <label class="form-check-label" for="point_building">
                                Building
                            </label>
                        </div>

                        <div class="form-check">
                            <input name="sugarcane" class="form-check-input border border-secondary" type="checkbox"
                                value="" id="point_sugarcane" data-layer="sugarcane">
                            <label class="form-check-label" for="point_sugarcane">
                                Sugarcane
                            </label>
                        </div>

                        <div class="form-check">
                            <input name="water" class="form-check-input border border-secondary" type="checkbox"
                                value="" id="point_water" data-layer="water">
                            <label class="form-check-label" for="point_water">
                                Water
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Tambahkan item lain di sini -->
            </div>

            <div class="border rounded mt-2">
                <!-- <div class="border-top"></div> -->
                <p class="bg-secondary p-2 m-0 rounded-top fw-bold text-white">Google Earth Engine
                    Chachoengsao
                    <a class="text-decoration-none text-white" data-bs-toggle="collapse" href="#GEE_chachoengsao"
                        role="button" aria-expanded="false" aria-controls="GEE_chachoengsao">
                        <i class="fas fa-angle-down text-white"></i>
                    </a>
                </p>
                <div id="GEE_chachoengsao" class="collapse">
                    <div class="p-2">
                        <div class="form-check d-none">
                            <input name="water" class="form-check-input border border-secondary" type="checkbox"
                                value="" id="water" data-layer="water">
                            <label class="form-check-label" for="water">
                                Chachoengsao Boundary
                            </label>
                        </div>
                        {{-- Geo Server --}}
                        <div class="form-check">
                            <input name="chachoengsao_prov" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="chachoengsao_prov"
                                data-layer="chachoengsao_prov">
                            <label class="form-check-label" for="chachoengsao_prov">
                                Chachoengsao Boundary
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="change_intensity" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="change_intensity" data-layer="change_intensity">
                            <label class="form-check-label" for="water">
                                Change Intensity
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="igbp" class="form-check-input border border-secondary" type="checkbox"
                                value="" id="igbp" data-layer="igbp">
                            <label class="form-check-label" for="igbp">
                                IGBP
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="lst" class="form-check-input border border-secondary" type="checkbox"
                                value="" id="lst" data-layer="lst">
                            <label class="form-check-label" for="lst">
                                LST
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="occurrence" class="form-check-input border border-secondary" type="checkbox"
                                value="" id="occurrence" data-layer="occurrence">
                            <label class="form-check-label" for="occurrence">
                                Occurrence
                            </label>
                        </div>

                        <div class="form-check">
                            <input name="water_season" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="water_season" data-layer="water_season">
                            <label class="form-check-label" for="water_season">
                                Water Season
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Tambahkan item lain di sini -->
            </div>
        </div>

        {{-- LAYER NAKHON --}}
        <div id="layer_nakhon" class="d-none">
            {{-- GEO SERVER NAKHON --}}
            <div class="border rounded mt-2">
                <!-- <div class="border-top"></div> -->
                <p class="bg-secondary p-2 m-0 rounded-top fw-bold d-flex text-white">GeoServer Nakhon
                    Pathom<a data-bs-toggle="collapse" href="#GEE_nakhon_phatom" role="button"
                        aria-expanded="false" aria-controls="GEE_nakhon_phatom">
                        <i class="fas fa-angle-down text-white"></i>
                    </a></p>
                <div class="collapse" id="GEE_nakhon_phatom">
                    <div class="p-2">
                        <div class="form-check">
                            <input name="final_nakhon" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="final_nakhon" data-layer="final_nakhon">
                            <label class="form-check-label" for="final_nakhon">
                                final_nakhon
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="admin_phichit" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="admin_phichit" data-layer="admin_phichit"
                                checked>
                            <label class="form-check-label" for="admin_phichit">
                                Admin Nakhon Pathom
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="agriculture_phichit" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="agriculture_phichit"
                                data-layer="agriculture_phichit" checked>
                            <label class="form-check-label" for="agriculture_phichit">
                                Agriculture
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="change_line_phichit" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="change_line_phichit"
                                data-layer="change_line_phichit">
                            <label class="form-check-label" for="change_line_phichit">
                                Change Line
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="MS1_phichit" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="MS1_phichit" data-layer="MS1_phichit">
                            <label class="form-check-label" for="MS1_phichit">
                                MS 1
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="rail_phichit" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="rail_phichit" data-layer="rail_phichit">
                            <label class="form-check-label" for="rail_phichit">
                                Rail
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="water_river_nakhon" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="water_river_nakhon"
                                data-layer="water_river_nakhon">
                            <label class="form-check-label" for="water_river_nakhon">
                                River
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="river_polygon_NP" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="river_polygon_NP" data-layer="river_polygon_NP">
                            <label class="form-check-label" for="river_polygon_NP">
                                River Polygon
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border rounded mt-2">
                <!-- <div class="border-top"></div> -->
                <p class="bg-secondary p-2 m-0 rounded-top fw-bold">
                    <a class="text-decoration-none text-white" data-bs-toggle="collapse" href="#g01_nakhon"
                        role="button" aria-expanded="false" aria-controls="g01_nakhon">G01 Nakhon Phatom
                        <i class="fas fa-angle-down text-white"></i>
                    </a>
                </p>
                <div class="collapse" id="g01_nakhon">
                    <div class="p-2">
                        {{-- GO1 LIST child 1 --}}
                        <div class="form-check">
                            <label class="form-check-label" for="ทิศทางการไหล_child_1">
                                <a class="text-decoration-none text-dark" data-bs-toggle="collapse" href="#g01_list"
                                    role="button" aria-expanded="false" aria-controls="g01_list">ทิศทางการไหล
                                    <i class="fas fa-angle-down text-dark"></i>
                                </a>
                            </label>
                            <div class="collapse" id="g01_list">
                                <div class="form-check">
                                    <input name="ผิวดิน_child_1" class="form-check-input border border-secondary"
                                        type="checkbox" value="" id="ผิวดิน_child_1"
                                        data-layer="ผิวดิน_child_1">
                                    <label class="form-check-label" for="ผิวดิน_child_1">
                                        ผิวดิน_child_1
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="ทิศทางน้ำไหล_child_2"
                                        class="form-check-input border border-secondary" type="checkbox"
                                        value="" id="ทิศทางน้ำไหล_child_2" data-layer="ทิศทางน้ำไหล_child_2">
                                    <label class="form-check-label" for="ทิศทางน้ำไหล_child_2">
                                        ทิศทางน้ำไหล_child_2
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="แนวคันป้องกันน้ำท่วม_child_3"
                                        class="form-check-input border border-secondary" type="checkbox"
                                        value="" id="แนวคันป้องกันน้ำท่วม_child_3"
                                        data-layer="แนวคันป้องกันน้ำท่วม_child_3">
                                    <label class="form-check-label" for="แนวคันป้องกันน้ำท่วม_child_3">
                                        แนวคันป้องกันน้ำท่วม_child_3
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="คลองส่งน้ำ_นครปฐม_child_4"
                                        class="form-check-input border border-secondary" type="checkbox"
                                        value="" id="คลองส่งน้ำ_นครปฐม_child_4"
                                        data-layer="คลองส่งน้ำ_นครปฐม_child_4">
                                    <label class="form-check-label" for="คลองส่งน้ำ_นครปฐม_child_4">
                                        คลองส่งน้ำ_นครปฐม_child_4
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="คลองส่งน้ำ_บางเลน_child_5"
                                        class="form-check-input border border-secondary" type="checkbox"
                                        value="" id="คลองส่งน้ำ_บางเลน_child_5"
                                        data-layer="คลองส่งน้ำ_บางเลน_child_5">
                                    <label class="form-check-label" for="คลองส่งน้ำ_บางเลน_child_5">
                                        คลองส่งน้ำ_บางเลน_child_5
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="คลองส่งน้ำ_พนมทวน_child_6"
                                        class="form-check-input border border-secondary" type="checkbox"
                                        value="" id="คลองส่งน้ำ_พนมทวน_child_6"
                                        data-layer="คลองส่งน้ำ_พนมทวน_child_6">
                                    <label class="form-check-label" for="คลองส่งน้ำ_พนมทวน_child_6">
                                        คลองส่งน้ำ_พนมทวน_child_6
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="คลองส่งน้ำ_พระพิมล_child_7"
                                        class="form-check-input border border-secondary" type="checkbox"
                                        value="" id="คลองส่งน้ำ_พระพิมล_child_7"
                                        data-layer="คลองส่งน้ำ_พระพิมล_child_7">
                                    <label class="form-check-label" for="คลองส่งน้ำ_พระพิมล_child_7">
                                        คลองส่งน้ำ_พระพิมล_child_7
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="คลองส่งน้ำ_ภาษีเจริญ_child_8"
                                        class="form-check-input border border-secondary" type="checkbox"
                                        value="" id="คลองส่งน้ำ_ภาษีเจริญ_child_8"
                                        data-layer="คลองส่งน้ำ_ภาษีเจริญ_child_8">
                                    <label class="form-check-label" for="คลองส่งน้ำ_ภาษีเจริญ_child_8">
                                        คลองส่งน้ำ_ภาษีเจริญ_child_8
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="คลองส่งน้ำ_นครชุม_child_9"
                                        class="form-check-input border border-secondary" type="checkbox"
                                        value="" id="คลองส่งน้ำ_นครชุม_child_9"
                                        data-layer="คลองส่งน้ำ_นครชุม_child_9">
                                    <label class="form-check-label" for="คลองส่งน้ำ_นครชุม_child_9">
                                        คลองส่งน้ำ_นครชุม_child_9
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="คลองส่งน้ำ_กำแพงแสน_child_10"
                                        class="form-check-input border border-secondary" type="checkbox"
                                        value="" id="คลองส่งน้ำ_กำแพงแสน_child_10"
                                        data-layer="คลองส่งน้ำ_กำแพงแสน_child_10">
                                    <label class="form-check-label" for="คลองส่งน้ำ_กำแพงแสน_child_10">
                                        คลองส่งน้ำ_กำแพงแสน_child_10
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-check">
                            <input name="เขื่อนป้องกันตลิ่งนครปฐม_child_2"
                                class="form-check-input border border-secondary" type="checkbox" value=""
                                id="เขื่อนป้องกันตลิ่งนครปฐม_child_2" data-layer="เขื่อนป้องกันตลิ่งนครปฐม_child_2">
                            <label class="form-check-label" for="เขื่อนป้องกันตลิ่งนครปฐม_child_2">
                                เขื่อนป้องกันตลิ่งนครปฐม_child_2
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="barrage_L_child_3" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="barrage_L_child_3"
                                data-layer="barrage_L_child_3">
                            <label class="form-check-label" for="barrage_L_child_3">
                                barrage_L_child_3
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="พื้นที่น้ำท่วมนครปฐม_child_4"
                                class="form-check-input border border-secondary" type="checkbox" value=""
                                id="พื้นที่น้ำท่วมนครปฐม_child_4" data-layer="พื้นที่น้ำท่วมนครปฐม_child_4">
                            <label class="form-check-label" for="พื้นที่น้ำท่วมนครปฐม_child_4">
                                พื้นที่น้ำท่วมนครปฐม_child_4
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="จุดเสี่ยงและจุดเกิดปัญหานครปฐม_child_5"
                                class="form-check-input border border-secondary" type="checkbox" value=""
                                id="จุดเสี่ยงและจุดเกิดปัญหานครปฐม_child_5"
                                data-layer="จุดเสี่ยงและจุดเกิดปัญหานครปฐม_child_5">
                            <label class="form-check-label" for="จุดเสี่ยงและจุดเกิดปัญหานครปฐม_child_5">
                                จุดเสี่ยงและจุดเกิดปัญหานครปฐม_child_5
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="bridge_P_child_6" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="bridge_P_child_6" data-layer="bridge_P_child_6">
                            <label class="form-check-label" for="bridge_P_child_6">
                                bridge_P_child_6
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border rounded mt-2">
                <!-- <div class="border-top"></div> -->
                <p class="bg-secondary p-2 m-0 rounded-top fw-bold">
                    <a class="text-decoration-none text-white" data-bs-toggle="collapse" href="#g02_nakhon"
                        role="button" aria-expanded="false" aria-controls="g02_nakhon">G02 Nakhon Phatom
                        <i class="fas fa-angle-down text-white"></i>
                    </a>
                </p>
                <div class="collapse" id="g02_nakhon">
                    <div class="p-2">
                        <div class="form-check">
                            <input name="อ่างเก็บน้ำนครปฐม_child_1" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="อ่างเก็บน้ำนครปฐม_child_1"
                                data-layer="อ่างเก็บน้ำนครปฐม_child_1">
                            <label class="form-check-label" for="อ่างเก็บน้ำนครปฐม_child_1">
                                อ่างเก็บน้ำนครปฐม_child_1
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="ประตูน้ำนครปฐม_child_2" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="ประตูน้ำนครปฐม_child_2"
                                data-layer="ประตูน้ำนครปฐม_child_2">
                            <label class="form-check-label" for="ประตูน้ำนครปฐม_child_2">
                                ประตูน้ำนครปฐม_child_2
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="watergate_P_child_3" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="watergate_P_child_3"
                                data-layer="watergate_P_child_3">
                            <label class="form-check-label" for="watergate_P_child_3">
                                watergate_P_child_3
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="weir_P_child_4" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="weir_P_child_4" data-layer="weir_P_child_4">
                            <label class="form-check-label" for="weir_P_child_4">
                                weir_P_child_4
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="บ่อน้ำนครปฐม_child_5" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="บ่อน้ำนครปฐม_child_5"
                                data-layer="บ่อน้ำนครปฐม_child_5">
                            <label class="form-check-label" for="บ่อน้ำนครปฐม_child_5">
                                บ่อน้ำนครปฐม_child_5
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="waterplantDLA_P_child_6" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="waterplantDLA_P_child_6"
                                data-layer="waterplantDLA_P_child_6">
                            <label class="form-check-label" for="waterplantDLA_P_child_6">
                                waterplantDLA_P_child_6
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="พื้นที่น้ำเสียนครปฐม_child_7"
                                class="form-check-input border border-secondary" type="checkbox" value=""
                                id="พื้นที่น้ำเสียนครปฐม_child_7" data-layer="พื้นที่น้ำเสียนครปฐม_child_7">
                            <label class="form-check-label" for="พื้นที่น้ำเสียนครปฐม_child_7">
                                พื้นที่น้ำเสียนครปฐม_child_7
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="พื้นที่ภัยแล้งนครปฐม_child_8"
                                class="form-check-input border border-secondary" type="checkbox" value=""
                                id="พื้นที่ภัยแล้งนครปฐม_child_8" data-layer="พื้นที่ภัยแล้งนครปฐม_child_8">
                            <label class="form-check-label" for="พื้นที่ภัยแล้งนครปฐม_child_8">
                                พื้นที่ภัยแล้งนครปฐม_child_8
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="พื้นที่เกษตรกรรมนครปฐม_child_9"
                                class="form-check-input border border-secondary" type="checkbox" value=""
                                id="พื้นที่เกษตรกรรมนครปฐม_child_9" data-layer="พื้นที่เกษตรกรรมนครปฐม_child_9">
                            <label class="form-check-label" for="พื้นที่เกษตรกรรมนครปฐม_child_9">
                                พื้นที่เกษตรกรรมนครปฐม_child_9
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="prototype_P_child_10" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="prototype_P_child_10"
                                data-layer="prototype_P_child_10">
                            <label class="form-check-label" for="prototype_P_child_10">
                                prototype_P_child_10
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border rounded mt-2">
                <!-- <div class="border-top"></div> -->
                <p class="bg-secondary p-2 m-0 rounded-top fw-bold">
                    <a class="text-decoration-none text-white" data-bs-toggle="collapse" href="#g03_nakhon"
                        role="button" aria-expanded="false" aria-controls="g03_nakhon">G03
                        Nakhon Phatom
                        <i class="fas fa-angle-down text-white"></i>
                    </a>
                </p>
                <div class="collapse" id="g03_nakhon">
                    <div class="p-2">
                        <div class="form-check">
                            <input name="จุดกำจัดขยะนครปฐม_child_1" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="จุดกำจัดขยะนครปฐม_child_1"
                                data-layer="จุดกำจัดขยะนครปฐม_child_1">
                            <label class="form-check-label" for="จุดกำจัดขยะนครปฐม_child_1">
                                จุดกำจัดขยะนครปฐม_child_1
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="solid_waste_trmt_P_child_2" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="solid_waste_trmt_P_child_2"
                                data-layer="solid_waste_trmt_P_child_2">
                            <label class="form-check-label" for="solid_waste_trmt_P_child_2">
                                solid_waste_trmt_P_child_2
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="จุดบำบัดน้ำเสียนครปฐม_child_3"
                                class="form-check-input border border-secondary" type="checkbox" value=""
                                id="จุดบำบัดน้ำเสียนครปฐม_child_3" data-layer="จุดบำบัดน้ำเสียนครปฐม_child_3">
                            <label class="form-check-label" for="จุดบำบัดน้ำเสียนครปฐม_child_3">
                                จุดบำบัดน้ำเสียนครปฐม_child_3
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="sewage_trmt_P_child_4" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="sewage_trmt_P_child_4"
                                data-layer="sewage_trmt_P_child_4">
                            <label class="form-check-label" for="sewage_trmt_P_child_4">
                                sewage_trmt_P_child_4
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="จุดอพยพนครปฐม_child_5" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="จุดอพยพนครปฐม_child_5"
                                data-layer="จุดอพยพนครปฐม_child_5">
                            <label class="form-check-label" for="จุดอพยพนครปฐม_child_5">
                                จุดอพยพนครปฐม_child_5
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="evacuation_P_child_6" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="evacuation_P_child_6"
                                data-layer="evacuation_P_child_6">
                            <label class="form-check-label" for="evacuation_P_child_6">
                                evacuation_P_child_6
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="ตำแหน่งระบบประปานครปฐม_child_7"
                                class="form-check-input border border-secondary" type="checkbox" value=""
                                id="ตำแหน่งระบบประปานครปฐม_child_7" data-layer="ตำแหน่งระบบประปานครปฐม_child_7">
                            <label class="form-check-label" for="ตำแหน่งระบบประปานครปฐม_child_7">
                                ตำแหน่งระบบประปานครปฐม_child_7
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="hydro_P_child_8" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="hydro_P_child_8" data-layer="hydro_P_child_8">
                            <label class="form-check-label" for="hydro_P_child_8">
                                hydro_P_child_8
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="แหล่งท่องเที่ยวนครปฐม_child_9"
                                class="form-check-input border border-secondary" type="checkbox" value=""
                                id="แหล่งท่องเที่ยวนครปฐม_child_9" data-layer="แหล่งท่องเที่ยวนครปฐม_child_9">
                            <label class="form-check-label" for="แหล่งท่องเที่ยวนครปฐม_child_9">
                                แหล่งท่องเที่ยวนครปฐม_child_9
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="landmark_P_child_10" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="landmark_P_child_10"
                                data-layer="landmark_P_child_10">
                            <label class="form-check-label" for="landmark_P_child_10">
                                landmark_P_child_10
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="พื้นที่สาธารณะนครปฐม_child_11"
                                class="form-check-input border border-secondary" type="checkbox" value=""
                                id="พื้นที่สาธารณะนครปฐม_child_11" data-layer="พื้นที่สาธารณะนครปฐม_child_11">
                            <label class="form-check-label" for="พื้นที่สาธารณะนครปฐม_child_11">
                                พื้นที่สาธารณะนครปฐม_child_11
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border rounded mt-2 d-none">
                <!-- <div class="border-top"></div> -->
                <p class="bg-secondary p-2 m-0 rounded-top fw-bold">GEE Nakhon Pathom</p>
                <div class="p-2">
                    <div class="form-check">
                        <input name="nakhon_admin" class="form-check-input border border-secondary" type="checkbox"
                            value="" id="nakhon_admin" data-layer="nakhon_admin">
                        <label class="form-check-label" for="nakhon_admin">
                            Admin Nakhon Pathom
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="nakhon_agriculture" class="form-check-input border border-secondary"
                            type="checkbox" value="" id="nakhon_agriculture" data-layer="nakhon_agriculture">
                        <label class="form-check-label" for="nakhon_agriculture">
                            Agriculture
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="nakhon_change" class="form-check-input border border-secondary" type="checkbox"
                            value="" id="nakhon_change" data-layer="nakhon_change">
                        <label class="form-check-label" for="nakhon_change">
                            Change Line
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="nakhon_msi" class="form-check-input border border-secondary" type="checkbox"
                            value="" id="nakhon_msi" data-layer="nakhon_msi">
                        <label class="form-check-label" for="nakhon_msi">
                            MSI
                        </label>
                    </div>
                    <div class="form-check">
                        <input name="nakhon_rail" class="form-check-input border border-secondary" type="checkbox"
                            value="" id="nakhon_rail" data-layer="nakhon_rail">
                        <label class="form-check-label" for="nakhon_rail">
                            Rail
                        </label>
                    </div>
                </div>
            </div>
            <div class="border rounded mt-2">
                <!-- <div class="border-top"></div> -->
                <p class="bg-secondary p-2 m-0 rounded-top fw-bold">
                    <a class="text-decoration-none text-white" data-bs-toggle="collapse" href="#water_nakhon_phatom"
                        role="button" aria-expanded="false" aria-controls="water_nakhon_phatom">Water Nakhon Pathom
                        <i class="fas fa-angle-down text-white"></i>
                    </a>
                </p>
                <div class="collapse" id="water_nakhon_phatom">
                    <div class="p-2">
                        <div class="form-check">
                            <input name="ChangeIntensity" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="ChangeIntensity" data-layer="ChangeIntensity">
                            <label class="form-check-label" for="ChangeIntensity">
                                ChangeIntensity
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="Occurrence" class="form-check-input border border-secondary" type="checkbox"
                                value="" id="Occurrence" data-layer="Occurrence">
                            <label class="form-check-label" for="Occurrence">
                                Occurrence
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="Transition" class="form-check-input border border-secondary" type="checkbox"
                                value="" id="Transition" data-layer="Transition">
                            <label class="form-check-label" for="Transition">
                                Transition
                            </label>
                        </div>
                        <div class="form-check">
                            <input name="WaterSeason" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="WaterSeason" data-layer="WaterSeason">
                            <label class="form-check-label" for="WaterSeason">
                                WaterSeason
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Sidebar legend -->
<div class="container sidebar-legend bg-white mt-0 pb-5" id="sidebar-legend">
    <h5 class="text-center">Legend</h5>
    <div class="border mb-2"></div>
    <div class="col">
        <div class="border rounded mt-2">
            <!-- <div class="border-top"></div> -->
            <p class="bg-secondary p-2 m-0 rounded-top fw-bold text-white">Crop Legend</p>
            <div class="p-2">
                <div class="">
                    <img class="rounded float-left" src="frontpage/assets/icons/icon-marker/corn.png" alt="">
                    Corn
                    </label>
                </div>
                <div class="">
                    <img class="rounded float-left" src="frontpage/assets/icons/icon-marker/paddy.png"
                        alt="">
                    Paddy
                    </label>
                </div>
                <div class="">
                    <img class="rounded float-left" src="frontpage/assets/icons/icon-marker/baresoil.png"
                        alt="">
                    Baresoil
                    </label>
                </div>
                <div class="">
                    <img class="rounded float-left" src="frontpage/assets/icons/icon-marker/cassava.png"
                        alt="">
                    Cassava
                    </label>
                </div>
                <div class="">
                    <img class="rounded float-left" src="frontpage/assets/icons/icon-marker/eucalyptus.png"
                        alt="">
                    Eucalyptus
                    </label>
                </div>
                <div class="">
                    <img class="rounded float-left" src="frontpage/assets/icons/icon-marker/forest.png"
                        alt="">
                    Forest
                    </label>
                </div>
                <div class="">
                    <img class="rounded float-left" src="frontpage/assets/icons/icon-marker/grassland.png"
                        alt="">
                    Grassland
                    </label>
                </div>
                <div class="">
                    <img class="rounded float-left" src="frontpage/assets/icons/icon-marker/palm.png" alt="">
                    Palm
                    </label>
                </div>
                <div class="">
                    <img class="rounded float-left" src="frontpage/assets/icons/icon-marker/rubber.png"
                        alt="">
                    Rubber
                    </label>
                </div>
                <div class="">
                    <img class="rounded float-left" src="frontpage/assets/icons/icon-marker/gedung.png"
                        alt="">
                    Building
                    </label>
                </div>
                <div class="">
                    <img class="rounded float-left" src="frontpage/assets/icons/icon-marker/sugarcan.png"
                        alt="">
                    Sugarcane
                    </label>
                </div>
                <div class="">
                    <img class="rounded float-left" src="frontpage/assets/icons/icon-marker/water.png"
                        alt="">
                    Water
                    </label>
                </div>

            </div>

            <!-- Tambahkan item lain di sini -->
        </div>

        {{-- <div class="border rounded mt-2">
            <!-- <div class="border-top"></div> -->
            <p class="bg-secondary p-2 m-0 rounded-top fw-bold">Province Chachoengsao</p>
            <div class="p-2">
                <div class="">
                    <img class="rounded float-left"
                        src="http://localhost:8080/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&STRICT=false&style=style_prov_chachoengsao"
                        alt="">
                    Province boundary
                    </label>
                </div>

            </div>

        </div>

        <div class="border rounded mt-2 mb-4">
            <!-- <div class="border-top"></div> -->
            <p class="bg-secondary p-2 m-0 rounded-top fw-bold">Water Chachoengsao</p>
            <div class="p-2">
                <div class="">
                    <img class="rounded float-left"
                        src="http://localhost:8080/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&STRICT=false&style=thailand_service:style_river_chachoengsao"
                        alt="">
                    </label>
                </div>

            </div>

        </div> --}}
        {{-- <div class="border rounded mt-2 mb-4">
            <!-- <div class="border-top"></div> -->
            <p class="bg-secondary p-2 m-0 rounded-top fw-bold">Water Chachoengsao</p>
            <div class="p-2">
                <div class="">
                    <img class="rounded float-left"
                        src="http://localhost:8080/geoserver/wms?REQUEST=GetLegendGraphic&VERSION=1.0.0&FORMAT=image/png&WIDTH=20&HEIGHT=20&STRICT=false&style=thailand_service:style_river_chachoengsao"
                        alt="">
                </div>
            </div>
        </div> --}}
    </div>
</div>

</div>


<!-- Sidebar analisis with AOI -->
<div class="container sidebar-analisis bg-white mt-0 pb-5" id="sidebar-analisis">
    <h5 class="text-center">Analysis Information</h5>
    <div class="border mb-2"></div>
    <div class="col">
        <div class="border rounded mt-2 p-2">

            <form action="" method="post" id="datForm">
                <div class="form-group mt-2">
                    <label for="geometry">Geometry</label>
                    <textarea class="form-control" id="geometry" name="geometry" placeholder="Geojson"></textarea>
                </div>
                <div class="form-group mt-2">
                    <label for="type">Type</label>
                    <input class="form-control" id="type" name="type" placeholder="Automatic by draw"
                        readonly>
                </div>

                <div class="row mb-2">
                    <div class="col">
                        <div class="form-group mt-2">
                            <label for="startYear">Start Year</label>
                            {{-- <input class="form-control" id="startYear" name="startYear" placeholder="startYear" required> --}}
                            <select id="startYear" class="form-select" aria-label="Default select example">
                                {{-- <option>Start Year</option> --}}
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022" selected>2022</option>
                            </select>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group mt-2">
                            <label for="endYear">End Year</label>
                            {{-- <input class="form-control" id="endYear" name="endYear" placeholder="endYear" required> --}}
                            <select id="endYear" class="form-select" aria-label="Default select example">
                                {{-- <option>Start Year</option> --}}
                                <option value="2018">2018</option>
                                <option value="2019">2019</option>
                                <option value="2020">2020</option>
                                <option value="2021">2021</option>
                                <option value="2022" selected>2022</option>
                            </select>
                        </div>
                    </div>
                </div>
                {{-- get info --}}
                <div id="getInfo" class="d-flex justify-content-end mt-2">
                    <button type="button" class="btn text-white" style="background-color: #8b5cf6;"
                        id="reqInfo">Get
                        Information</button>
                </div>
                {{-- load get info --}}
                <div id="loadInfo" class="d-flex justify-content-end mt-2 d-none">
                    <button class="btn text-white" style="background-color: #8b5cf6;" type="button" disabled>
                        <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                        Loading...
                    </button>
                </div>

            </form>
        </div>
        <div class="mt-3">
            <div class="">
                <div class="form-check">
                    <input name="precipitation" class="form-check-input border border-secondary d-none"
                        type="checkbox" value="" id="precipitation_id" data-layer="precipitation">
                    <label class="form-check-label" for="precipitation">
                        Precipitation
                    </label>
                </div>
                <div class="border rounded mt-2 mb-3">
                    <div id="loadingPrecipitation"
                        class="d-flex justify-content-center align-items-center mt-5 mb-5 d-none">
                        <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <p id="failedGetPrecipitation" class="text-center mt-3 mb-3 d-none">Data not found</p>
                    <div id="grafikPrecipitation" class="d-none">
                        <canvas id="chartRequestPrecipitation"></canvas>
                        <p class="text-center">Month</p>
                    </div>

                </div>
            </div>
            <div class="">
                <div class="form-check">
                    <input name="vci" class="form-check-input border border-secondary d-none" type="checkbox"
                        value="" id="vci_id" data-layer="vci" checked>
                    <label class="form-check-label" for="vci">
                        VCI (Vegetation Condition Index)
                    </label>
                </div>
                <div class="border rounded mt-2 mb-3">
                    <div id="loadingVCI" class="d-flex justify-content-center align-items-center mt-5 mb-5 d-none">
                        <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <p id="failedGetVCI" class="text-center mt-3 mb-3 d-none">Data not found</p>
                    <div id="grafikVCI" class="d-none">
                        <canvas id="chartRequestVci"></canvas>
                        <p class="text-center">Month</p>
                    </div>

                </div>
            </div>
            <div class="">
                <div class="form-check">
                    <input name="evi" class="form-check-input border border-secondary d-none" type="checkbox"
                        value="" id="evi_id" data-layer="evi">
                    <label class="form-check-label" for="evi">
                        EVI (Enhanced Vegetation Index)
                    </label>
                </div>

                <div class="border rounded mt-2 mb-3">
                    <div id="loadingEVI" class="d-flex justify-content-center align-items-center mt-5 mb-5 d-none">
                        <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <p id="failedGetEVI" class="text-center mt-3 mb-3 d-none">Data not found</p>
                    <div id="grafikEVI" class="d-none">
                        <canvas id="chartRequestEvi"></canvas>
                        <p class="text-center">Month</p>
                    </div>

                </div>
            </div>
            <div class="">
                <div class="form-check">
                    <input name="msi" class="form-check-input border border-secondary d-none" type="checkbox"
                        value="" id="msi_id" data-layer="msi">
                    <label class="form-check-label" for="msi">
                        MSI (Moisture Stress Index)
                    </label>
                </div>

                <div class="border rounded mt-2 mb-3">
                    <div id="loadingMSI" class="d-flex justify-content-center align-items-center mt-5 mb-5 d-none">
                        <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </div>
                    <p id="failedGetMSI" class="text-center mt-3 mb-3 d-none">Data not found</p>
                    <div id="grafikMSI" class="d-none">
                        <canvas id="chartRequestMsi"></canvas>
                        <p class="text-center">Month</p>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>
