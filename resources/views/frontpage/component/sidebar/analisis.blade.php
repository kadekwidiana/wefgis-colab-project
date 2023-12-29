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
                    <input class="form-control" id="type" name="type" placeholder="Automatic by draw" readonly>
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
                    <button type="button" class="btn text-white" style="background-color: #8b5cf6;" id="reqInfo">Get
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
                    <input name="precipitation" class="form-check-input border border-secondary d-none" type="checkbox"
                        value="" id="precipitation_id" data-layer="precipitation">
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
