@extends('frontpage.layouts.main')

@section('content')

    <body>
        @include('frontpage.layouts.navbar')
        {{-- @include('frontpage.layouts.sidebar') --}}
        {{-- SIDEBAR --}}
        {{-- Sidebar basemap --}}
        @include('frontpage.component.sidebar.basemap')

        {{-- Sidebar legend --}}
        @include('frontpage.component.sidebar.legend')

        {{-- Sidebar analisis --}}
        @include('frontpage.component.sidebar.analisis')

        <!-- Sidebar layer -->
        <div class="container sidebar-layer bg-white mt-0 pb-5" id="sidebar-layer">
            <div class="h6 text-dark">
                <input name="select_layer" class="form-check-input border border-secondary" type="radio" value="chachoengsao"
                    id="select_layer_chachoengsao" data-layer="select_layer" checked>
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
                    {{-- data from db Crop Chachoengsao --}}
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
                                    <input name="eucalyptus" class="form-check-input border border-secondary"
                                        type="checkbox" value="" id="point_eucalyptus" data-layer="eucalyptus">
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
                                    <input name="rubber" class="form-check-input border border-secondary"
                                        type="checkbox" value="" id="point_rubber" data-layer="rubber">
                                    <label class="form-check-label" for="point_rubber">
                                        Rubber
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input name="building" class="form-check-input border border-secondary"
                                        type="checkbox" value="" id="point_building" data-layer="building">
                                    <label class="form-check-label" for="point_building">
                                        Building
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input name="sugarcane" class="form-check-input border border-secondary"
                                        type="checkbox" value="" id="point_sugarcane" data-layer="sugarcane">
                                    <label class="form-check-label" for="point_sugarcane">
                                        Sugarcane
                                    </label>
                                </div>

                                <div class="form-check">
                                    <input name="water" class="form-check-input border border-secondary"
                                        type="checkbox" value="" id="point_water" data-layer="water">
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
                                    <input name="water" class="form-check-input border border-secondary"
                                        type="checkbox" value="" id="water" data-layer="water">
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
                                        type="checkbox" value="" id="change_intensity"
                                        data-layer="change_intensity">
                                    <label class="form-check-label" for="water">
                                        Change Intensity
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="igbp" class="form-check-input border border-secondary"
                                        type="checkbox" value="" id="igbp" data-layer="igbp">
                                    <label class="form-check-label" for="igbp">
                                        IGBP
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="lst" class="form-check-input border border-secondary"
                                        type="checkbox" value="" id="lst" data-layer="lst">
                                    <label class="form-check-label" for="lst">
                                        LST
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="occurrence" class="form-check-input border border-secondary"
                                        type="checkbox" value="" id="occurrence" data-layer="occurrence">
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
                    @foreach ($spatialGroups as $spatialGroup)
                        <div class="border rounded mt-2">
                            <!-- <div class="border-top"></div> -->
                            <p class="bg-secondary p-2 m-0 rounded-top fw-bold">
                                <a class="text-decoration-none text-white" data-bs-toggle="collapse"
                                    href="#id-gr{{ $spatialGroup->group_id }}" role="button" aria-expanded="false"
                                    aria-controls="{{ $spatialGroup->group_id }}">{{ $spatialGroup->name }}
                                    <i class="fas fa-angle-down text-white"></i>
                                </a>
                            </p>
                            <div class="collapse" id="id-gr{{ $spatialGroup->group_id }}">
                                <div class="p-2">
                                    @foreach ($spatials as $spatial)
                                        @if ($spatial->group_id == $spatialGroup->group_id)
                                            <div class="form-check">
                                                <input name="{{ $spatial->name }}"
                                                    class="form-check-input border border-secondary" type="checkbox"
                                                    value="" id="checkboxId{{ $spatial->sp_id }}"
                                                    data-layer="{{ $spatial->name }}">
                                                <label class="form-check-label" for="{{ $spatial->name }}">
                                                    {{ $spatial->title }}
                                                </label>
                                            </div>
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>
        </div>
        <!-- Content -->
        <div class="content">
            <div id="map">
            </div>
        </div>
    </body>
    @include('frontpage.package.package-js')
    <script>
        // WMS GEOSERVER
        // func for display layer wms and control
        function layerWmsAndControl(urlWms, layerName, attr, chkbxId) {
            // layer WMS to map
            const wmsLayer = L.tileLayer.wms(urlWms, {
                layers: layerName, // name layer
                format: 'image/png',
                attribution: attr,
                transparent: true,
            });

            document.getElementById(chkbxId).addEventListener('change', function() {
                if (this.checked) {
                    map.addLayer(wmsLayer);
                } else {
                    map.removeLayer(wmsLayer);
                }
            });
        }
        // data spatial
        @foreach ($spatials as $item)
            // console.log('{{ $item->url }}');
            layerWmsAndControl('{{ $item->url }}', '{{ $item->name }}', '{{ $item->attribute }}',
                'checkboxId{{ $item->sp_id }}')
        @endforeach
    </script>
@endsection
