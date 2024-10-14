{{-- Sidebar layer --}}
<div class="container sidebar-layer bg-white mt-0 pb-5" id="sidebar-layer">
    {{-- data regency/provinci --}}
    @foreach ($regencies as $regency)
        <div class="h6 text-dark">
            <input name="select_layer" class="form-check-input border border-secondary" type="radio"
                value="{{ $regency->regency }}" id="{{ $regency->regency }}" data-layer="select_layer"
                {{ $regency->regency === 'Chachoengsao' ? 'checked' : '' }}>
            <strong>{{ $regency->regency }}</strong>
        </div>
    @endforeach
    <div class="border mb-2"></div>
    <div class="col pb-4">
        {{-- data regency/provinci --}}
        @foreach ($regencies as $regency)
            <div id="layer_{{ $regency->regency_id }}"
                class="{{ $regency->regency === 'Chachoengsao' ? '' : 'd-none' }}">
                Layer {{ $regency->regency }}
                {{-- spatialGroup based regency --}}
                @foreach ($spatialGroups as $spatialGroup)
                    @if ($spatialGroup->regency_id == $regency->regency_id)
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
                                    {{-- layer data area from backpage, data area yang ada di lu_id landUse --}}
                                    @php
                                        $uniqueLandUses = [];
                                    @endphp
                                    @foreach ($waters as $water)
                                        @if ($water->group_id == $spatialGroup->group_id)
                                            {{-- lu_id dalam bentuk array [1,2,...] --}}
                                            @if (is_array($water->lu_id))
                                                @foreach ($water->lu_id as $luId)
                                                    {{-- tambahkan landuse ke dalam array jika belum ada --}}
                                                    @foreach ($landUses as $landUse)
                                                        {{-- cek landuse, apakah data nya sudah di tampilkan or tidak --}}
                                                        @if ($landUse->lu_id == $luId && !in_array($landUse->landuse, $uniqueLandUses))
                                                            {{-- {{ $landUse->landuse }} --}}
                                                            {{-- tampilkan ke tag html --}}
                                                            <div class="form-check">
                                                                <input name="{{ $landUse->landuse }}"
                                                                    class="form-check-input border border-secondary"
                                                                    type="checkbox" value=""
                                                                    id="checkboxId_lu{{ $landUse->lu_id }}"
                                                                    data-layer="{{ $landUse->landuse }}">
                                                                <label class="form-check-label"
                                                                    for="{{ $landUse->landuse }}">
                                                                    {{ $landUse->landuse }}
                                                                </label>
                                                            </div>
                                                            @php
                                                                $uniqueLandUses[] = $landUse->landuse;
                                                            @endphp
                                                        @endif
                                                    @endforeach
                                                @endforeach
                                            @endif
                                        @endif
                                    @endforeach

                                    {{-- data spatial from geoserver --}}
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
                                    {{-- data agriculture chachoengsao --}}
                                    @php
                                        $displayedClasses = [];
                                    @endphp

                                    @foreach ($agricultures as $agriculture)
                                        @if ($agriculture->group_id == $spatialGroup->group_id)
                                            @php
                                                $class = $agriculture->class;
                                            @endphp

                                            {{-- Menampilkan kelas hanya jika belum ditampilkan sebelumnya --}}
                                            @if (!in_array($class, $displayedClasses))
                                                <div class="form-check">
                                                    <input name="{{ $class }}"
                                                        class="form-check-input border border-secondary" type="checkbox"
                                                        value="" id="point_{{ $class }}"
                                                        data-layer="{{ $class }}">
                                                    <label class="form-check-label" for="point_{{ $class }}">
                                                        {{ $class }}
                                                    </label>
                                                </div>
                                                {{-- {{ $class }} --}}
                                                @php
                                                    $displayedClasses[] = $class; // Menambahkan kelas ke dalam array yang sudah ditampilkan
                                                @endphp
                                            @endif
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
                {{-- data layer GEE Chachoengsao --}}
                @if ($regency->regency == 'Chachoengsao')
                    <div class="border rounded mt-2">
                        <!-- <div class="border-top"></div> -->
                        <a class="text-decoration-none text-white" data-bs-toggle="collapse" href="#GEE_chachoengsao"
                            role="button" aria-expanded="false" aria-controls="GEE_chachoengsao">
                            <p class="bg-secondary p-2 m-0 rounded-top fw-bold text-white">Google Earth Engine
                                Chachoengsao
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
                                {{-- <div class="form-check">
                            <input name="chachoengsao_prov" class="form-check-input border border-secondary"
                                type="checkbox" value="" id="chachoengsao_prov"
                                data-layer="chachoengsao_prov">
                            <label class="form-check-label" for="chachoengsao_prov">
                                Chachoengsao Boundary
                            </label>
                        </div> --}}
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
                        {{--  menambahkan component static layer --}}
                        @include('components.static-layer')
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</div>
