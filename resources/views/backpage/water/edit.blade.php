@extends('backpage.layouts.main')
@push('addon-style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        span.select2.select2-container.select2-container--classic {
            width: 100% !important;
        }
    </style>
@endpush

@section('content')
    <!-- strat content -->
    <div class="bg-gray-100 flex-1 p-6 md:mt-16">
        <!-- Start Recent Sales -->
        <div class="card col-span-2 xl:col-span-1">
            <div class="flex justify-between items-center card-header">
                <h1 class="h5">Edit Data</h1>
            </div>
            <div class="">
                <ol
                    class="flex items-center w-full p-3 space-x-2 text-sm font-medium text-center text-gray-500 bg-white border border-gray-200 rounded-lg shadow-sm dark:text-gray-400 sm:text-base dark:bg-gray-800 dark:border-gray-700 sm:p-4 sm:space-x-4 rtl:space-x-reverse">
                    <li id="stepper1" class="flex items-center text-blue-600 dark:text-blue-500">
                        {{-- <span
                            class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
                            1
                        </span> --}}
                        Step 1 <span class="hidden sm:inline-flex sm:ms-2">Info</span>
                        <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                        </svg>
                    </li>
                    <li id="stepper2" class="flex items-center">
                        {{-- <span
                            class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                            2
                        </span> --}}
                        Step 2 <span class="hidden sm:inline-flex sm:ms-2">Info</span>
                        <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                        </svg>
                    </li>
                    {{-- <li id="stepper3" class="flex items-center">
                        <span
                            class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                            3
                        </span>
                        Review
                    </li> --}}
                </ol>
            </div>
        </div>

        <form action="{{ route('water.update', $water->water_id) }}" method="POST" enctype="multipart/form-data">
            @method('put')
            @csrf
            <!-- best seller & traffic -->
            <div id="form-section1" class="grid grid-cols-2 lg:grid-cols-1 gap-5 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Name
                            </label>
                            <input type="text" id="name" name="name"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Name" required value="{{ old('name', $water->name) }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="regency_id"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Regency</label>
                            <select id="regency_id" name="regency_id"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                required>
                                {{-- <option value="" disabled>Select Regency</option> --}}
                                @foreach ($regencies as $regency)
                                    <option value="{{ $regency->regency_id }}"
                                        {{ old('regency_id', $water->regency_id) == $regency->regency_id ? 'selected' : '' }}>
                                        {{ $regency->regency }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="flex space-x-4">
                            <div class="flex-1 mb-3">
                                <label for="latitude"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Latitude</label>
                                <input type="text" id="latitude" name="latitude"
                                    class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="Latitude" required value="{{ old('latitude', $water->latitude) }}"
                                    readonly>
                            </div>
                            <div class="flex-1 mb-3">
                                <label for="longitude"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Longitude</label>
                                <input type="text" id="longitude" name="longitude"
                                    class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="Longitude" required value="{{ old('longitude', $water->longitude) }}"
                                    readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="altitude"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Altitude
                            </label>
                            <input type="text" id="altitude" name="altitude"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Altitude" required value="{{ old('altitude', $water->altitude) }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="address"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Address
                            </label>
                            <textarea name="address" id="address" cols="10" rows="2"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                required placeholder="Address" readonly>{{ $water->address }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="aoi"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Geometry
                            </label>
                            <textarea name="aoi" id="aoi" cols="10" rows="3"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                required placeholder="Geometry" readonly>{{ $water->aoi }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="wide"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Wide
                            </label>
                            <input type="text" id="wide" name="wide"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Wide" required value="{{ $water->wide }}" readonly>
                        </div>

                        {{-- <div class="flex justify-end space-x-4">
                            <button type="submit" class="btn-bs-primary">Submit</button>
                            <button type="submit" class="btn-bs-primary">Submit</button>
                        </div> --}}
                        <a href="#step2" onclick="showSection2()"
                            class="btn-bs-success ml-auto lg:mr-0 lg:mb-6 px-2 w-24">Next</a>
                    </div>
                </div>
                {{-- maps display --}}
                <div class="card" id="map" style="z-index: 2;">
                    <div class="card-body">

                    </div>
                </div>
            </div>
            <!-- end best seller & traffic -->

            <!-- best seller & traffic -->
            <div id="form-section2" style="display: none;" class="grid grid-cols-2 lg:grid-cols-1 gap-5 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="ownership"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Ownership
                            </label>
                            <input type="text" id="ownership" name="ownership"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Ownership" required value="{{ old('ownership', $water->ownership) }}">
                        </div>
                        <div class="mb-3">
                            <label for="status_area"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Status Area
                            </label>
                            <input type="text" id="status_area" name="status_area"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Status Area" required value="{{ old('status_area', $water->status_area) }}">
                        </div>



                        {{-- <div class="mb-3">
                            <label for="related_photo"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Related Photo
                            </label>
                            <input type="hidden" name="oldRelatedPhoto" value="{{ $water->related_photo }}">
                            @if ($water->related_photo)
                                <img src="{{ asset('storage/' . $water->related_photo) }}"
                                    class="img-preview2 img-fluid mb-3 col-sm-5">
                            @else
                                <img class="img-preview2 img-fluid mb-3 col-sm-5">
                            @endif
                            <input type="file" id="related_photo" name="related_photo"
                                onchange="previewImage('#related_photo', '.img-preview2')"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Related Photo" value="{{ old($water->related_photo) }}">
                        </div> --}}
                        <div class="mb-3 hidden">
                            <label for="related_photo"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Related Photo
                            </label>
                            <input type="text" id="related_photo" name="related_photo"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Ownership" required
                                value="{{ old('related_photo', $water->related_photo) }}">
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">

                        <div class="flex space-x-4">
                            {{-- <div class="flex-1 mb-3">
                                <label for="lc_id"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Land Cover</label>
                                <select id="lc_id" name="lc_id"
                                    class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    required>
                                    <option value="" disabled selected>select Land Cover</option>
                                    @foreach ($landCovers as $lc)
                                        <option value="{{ $lc->lc_id }}"
                                            {{ old('lu_id', $water->lc_id) == $lc->lc_id ? 'selected' : '' }}>
                                            {{ $lc->lc_id }} {{ $lc->landcover }}
                                            type:
                                            {{ $lc->type }}</option>
                                    @endforeach
                                    <!-- Add more options as needed -->
                                </select>
                            </div> --}}
                            <div class="mb-3 hidden">
                                <label for="lc_id"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Land Cover
                                </label>
                                <input type="text" id="lc_id" name="lc_id"
                                    class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="Ownership" required value="{{ old('lc_id', $water->lc_id) }}">
                            </div>

                            {{-- <div class="flex-1 mb-3">
                                <label for="lu_id"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Land Use</label>
                                <select id="lu_id"
                                    class=" land-use-select shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    required name="lu_id[]" multiple>
                                   
                                    @foreach ($landUses as $lu)
                                        <option value="{{ $lu->lu_id }}"
                                            {{ in_array($lu->lu_id, json_decode($water->lu_id, true)) ? 'selected' : '' }}>
                                            {{ $lu->lu_id }} {{ $lu->landuse }}
                                        </option>
                                    @endforeach


                                    <!-- Add more options as needed -->
                                </select>
                            </div> --}}
                            <div class="mb-3 hidden">
                                <label for="lu_id"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Land Use
                                </label>
                                <input type="text" id="lu_id" name="lu_id"
                                    class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="Ownership" required value="{{ old('lu_id', $water->lu_id) }}">
                            </div>


                        </div>
                        <div class="mb-3 hidden">
                            <label for="permanence"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Permanence
                            </label>
                            <input type="text" id="permanence" name="permanence"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Permanence" required value="{{ old('permanence', $water->permanence) }}">
                        </div>

                        <div class="mb-3">
                            <label for="photo"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Photo
                            </label>
                            <input type="hidden" name="oldPhoto" value="{{ $water->photo }}">
                            @if ($water->photo)
                                <img src="{{ asset('storage/' . $water->photo) }}"
                                    class="img-preview1 img-fluid mb-3 col-sm-5">
                            @else
                                <img class="img-preview1 img-fluid mb-3 col-sm-5">
                            @endif

                            <input type="file" id="photo" name="photo"
                                onchange="previewImage('#photo', '.img-preview1')"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light "
                                placeholder="Photo" value="{{ old($water->photo) }}">
                        </div>

                        <div class="mb-3">
                            <label for="description"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Description
                            </label>
                            <textarea name="description" id="description" cols="10" rows="3"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                required placeholder="Description">{{ $water->description }}</textarea>
                        </div>

                        <div class="flex justify-end space-x-4">
                            <a href="#step1" onclick="showSection1()"
                                class="btn-bs-danger ml-auto mr-2 lg:mr-0 lg:mb-6 px-2 w-24">Back</a>
                            <button type="submit" class="btn-bs-primary">Submit</button>
                            {{-- <a href="#step3" onclick="showSection3()"
                                class="btn-bs-success ml-auto mr-2 lg:mr-0 lg:mb-6 px-2 w-24">Next</a> --}}
                        </div>
                    </div>
                </div>
            </div>

            <!-- end best seller & traffic -->

            <!-- best seller & traffic -->
            {{-- <div id="form-section3" style="display: none;" class="grid grid-cols-2 lg:grid-cols-1 gap-5 mt-2    ">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="regency"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Regency</label>
                            <select id="regency"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                required>
                                <option value="" disabled selected>Select Regency</option>
                                <option value="regency1">Regency 1</option>
                                <option value="regency2">Regency 2</option>
                                <option value="regency3">Regency 3</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>

                        <div class="flex space-x-4">
                            <div class="flex-1 mb-3">
                                <label for="river1"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Latitude</label>
                                <input type="text" id="river1"
                                    class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="Latitude" required>
                            </div>

                            <div class="flex-1 mb-3">
                                <label for="river2"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Longitude</label>
                                <input type="text" id="river2"
                                    class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="Longitude" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="river"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Altitude
                            </label>
                            <input type="text" id="river"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Altitude" required>
                        </div>
                        <div class="mb-3">
                            <label for="river"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Geometry
                            </label>
                            <textarea name="" id="" cols="10" rows="3"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Geometry"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="regency"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Regency</label>
                            <select id="regency"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                required>
                                <option value="" disabled selected>Select Regency</option>
                                <option value="regency1">Regency 1</option>
                                <option value="regency2">Regency 2</option>
                                <option value="regency3">Regency 3</option>
                                <!-- Add more options as needed -->
                            </select>
                        </div>

                        <div class="flex space-x-4">
                            <div class="flex-1 mb-3">
                                <label for="river1"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Latitude</label>
                                <input type="text" id="river1"
                                    class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="Latitude" required>
                            </div>

                            <div class="flex-1 mb-3">
                                <label for="river2"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Longitude</label>
                                <input type="text" id="river2"
                                    class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="Longitude" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="river"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Altitude
                            </label>
                            <input type="text" id="river"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Altitude" required>
                        </div>
                        <div class="mb-3">
                            <label for="river"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Geometry
                            </label>
                            <textarea name="" id="" cols="10" rows="3"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Geometry"></textarea>
                        </div>

                        <div class="flex justify-end space-x-4">
                            <a href="#step2" onclick="showSection2()"
                                class="btn-bs-danger ml-auto mr-2 lg:mr-0 lg:mb-6 px-2 w-24">Back</a>
                            <button type="submit" class="btn-bs-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- end best seller & traffic -->
        </form>
    </div>
    </div>
    <!-- end content -->

    {{-- IMPORT SCRIPT --}}
    @include('backpage.package.package-js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // function previewImage(img, preview) {
        //     const image = document.querySelector(img);
        //     const imgPreview = document.querySelector(preview);
        //     imgPreview.style.display = 'block';
        //     const oFReader = new FileReader();
        //     oFReader.readAsDataURL(image.files[0]);
        //     oFReader.onload = function(oFREvent) {
        //         imgPreview.src = oFREvent.target.result;
        //     }
        // }

        function previewImage(input, preview) {
            const image = document.querySelector(input);
            const imgPreview = document.querySelector(preview);
            imgPreview.style.display = 'block';

            const oFReader = new FileReader();

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            };

            oFReader.onerror = function(oFREvent) {
                console.error("Error reading file:", oFREvent.target.error);
                // Handle the error as needed.
            };

            if (image.files.length > 0) {
                // Jika ada berkas yang dipilih, tampilkan pratinjau
                oFReader.readAsDataURL(image.files[0]);
            } else {
                // Jika tidak ada berkas yang dipilih, gunakan sumber gambar yang sudah ada
                imgPreview.src = 'URL_GAMBAR_DEFAULT'; // Ganti dengan URL gambar default atau URL gambar yang sudah ada.
            }
        }

        // Func Stepper
        function showSection3() {
            $('#form-section3').show();
            $('#form-section2').hide();
            $('#form-section1').hide();
            $('#stepper3').addClass('text-blue-600 dark:text-blue-500');
            $('#stepper2').addClass('text-blue-600 dark:text-blue-500');
            $('#stepper1').addClass('text-blue-600 dark:text-blue-500');
        }

        function showSection2() {
            $('#form-section3').hide();
            $('#form-section2').show();
            $('#form-section1').hide();
            $('#stepper3').removeClass('text-blue-600 dark:text-blue-500');
            $('#stepper2').addClass('text-blue-600 dark:text-blue-500');
            $('#stepper1').addClass('text-blue-600 dark:text-blue-500');
        }

        function showSection1() {
            $('#form-section3').hide();
            $('#form-section2').hide();
            $('#form-section1').show();
            $('#stepper3').removeClass('text-blue-600 dark:text-blue-500');
            $('#stepper2').removeClass('text-blue-600 dark:text-blue-500');
            $('#stepper1').addClass('text-blue-600 dark:text-blue-500');
        }
        $('.land-use-select').select2({
            theme: "classic",
            placeholder: 'Select Land Use',
        });
        $(document).ready(function() {
            showSection1();
        });

        // MAPS LEAFLET
        // List Basemap
        const openStreetMap = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '©OpenStreetMap Contributors',
        });

        const satelliteMap = L.tileLayer('https://mt1.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
            attribution: '©Google Satellite Map',
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
            maxZoom: 20
        });

        const googleHibridMap = L.tileLayer('http://{s}.google.com/vt?lyrs=s,h&x={x}&y={y}&z={z}', {
            attribution: '©Google Hybrid Map',
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
            maxZoom: 20
        });

        const googleTerrain = L.tileLayer('https://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
            attribution: '©Google Terrain'
        });

        const googleTraffic = L.tileLayer('http://{s}.google.com/vt/lyrs=m,traffic&hl=en&x={x}&y={y}&z={z}&s=Ga', {
            maxZoom: 20,
            subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
            attribution: '©Google Traffic'
        });

        var map = L.map('map', {
            center: [-8.12826020526256, 115.09382752467408],
            zoom: 12,
            zoomControl: false,
            layers: googleHibridMap
        });

        // Feature search with GeoCoder plugin
        const osmGeocoder = new L.Control.Geocoder({
            collapsed: true,
            position: 'topleft',
            text: 'Search',
            title: 'Testing'
        }).addTo(map);
        document.getElementsByClassName('leaflet-control-geocoder-icon')[0]
            .className += ' fa-solid fa-magnifying-glass fa-xl';
        document.getElementsByClassName('leaflet-control-geocoder-icon')[0]
            .title += 'Search for a place';

        // Custom zoom control
        const customZoomControl = L.control.zoom({
            position: 'bottomright'
        });

        // Add the custom zoom control to the map
        map.addControl(customZoomControl);

        var baseMaps = {
            "OpenStreetMap": openStreetMap,
            "Google Satelite": satelliteMap,
            "Google Hibrid": googleHibridMap,
            "Google Terrain": googleTerrain,
            "Google Traffic": googleTraffic,
        };
        var layerControl = L.control.layers(baseMaps).addTo(map);

        // Tambahkan marker untuk lokasi pengguna
        // navigator.geolocation.getCurrentPosition(
        //     (position) => {
        //         const {
        //             latitude,
        //             longitude
        //         } = position.coords;
        //         const userMarker = L.marker([latitude, longitude]).addTo(map);
        //         userMarker.bindPopup('Your Location').openPopup();
        //         map.setView([latitude, longitude], 20);
        //     },
        //     (error) => {
        //         console.error('Error getting user location:', error.message);
        //     }, {
        //         enableHighAccuracy: true
        //     }
        // );

        // get altitude
        function getAltitude(lat, lng) {
            $.ajax({
                url: '/get-altitude',
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                },
                data: JSON.stringify({
                    latitude: lat,
                    longitude: lng,
                }),
                dataType: 'json',
                success: function(data) {
                    $('#altitude').val(data.altitude)
                    // console.log('Altitude:', data.altitude);
                },
                error: function(error) {
                    console.error('Error:', error);
                }
            });
        }

        // get address
        function getAddress(lat, lng) {
            $.ajax({
                url: `https://nominatim.openstreetmap.org/reverse?format=json&lat=${lat}&lon=${lng}`,
                method: 'GET',
                dataType: 'json',
                success: function(response) {
                    const address = response.display_name;
                    $('#address').val(address);
                },
                error: function(error) {
                    console.error(error);
                }
            });

            // USE THIS IF PROBLEM CROSS ORIGIN
            // $.ajax({
            //     url: '/get-address',
            //     method: 'POST',
            //     headers: {
            //         'Content-Type': 'application/json',
            //         'X-CSRF-TOKEN': '{{ csrf_token() }}',
            //     },
            //     data: JSON.stringify({
            //         latitude: lat,
            //         longitude: lng,
            //     }),
            //     dataType: 'json',
            //     success: function(data) {
            //         $('#address').val(data.address);
            //         console.log(data);
            //         // console.log('Altitude:', data.altitude);
            //     },
            //     error: function(error) {
            //         console.error('Error:', error);
            //     }
            // });
        }

        // Layer draw
        const drawnItems = new L.FeatureGroup(); //For save the elemen in draw
        map.addLayer(drawnItems); //Added fitur grup to maps
        const drawControl = new L.Control.Draw({
            position: 'topleft',
            draw: {
                polygon: {
                    shapeOptions: {
                        color: 'green', // Color border polygon
                        fillColor: 'rgba(0, 0, 0, 0.5)' // Fill color blue tranparant
                    },
                    allowIntersection: false,
                    drawError: {
                        color: 'orange',
                        timeout: 1000 //= 1 second
                    },
                    showArea: true, //Show polygon area when draw
                    metric: false,
                    repeatMode: true
                },
                // Fitur non aktif
                polyline: false,
                circlemarker: false, //circlemarker type has been disabled.
                rect: false,
                circle: false,
                rectangle: false

            },
            edit: {
                featureGroup: drawnItems
            }
        });
        map.addControl(drawControl); //Add to map

        // Create data geojson when draw element
        map.on('draw:created', function(e) {
            const type = e.layerType,
                layer = e.layer;
            // Remove only elements of the appropriate type
            if (type === 'marker') {
                drawnItems.eachLayer(function(existingLayer) {
                    if (existingLayer instanceof L.Marker) {
                        drawnItems.removeLayer(existingLayer);
                    }
                });
            } else if (type === 'polygon') {
                drawnItems.eachLayer(function(existingLayer) {
                    if (existingLayer instanceof L.Polygon) {
                        drawnItems.removeLayer(existingLayer);
                    }
                });
            }
            // Add new elements draw
            drawnItems.addLayer(layer);

            // Condition type marker
            if (type === 'marker') {
                // Take coordinate from draw element
                const coordinates = layer.getLatLng();
                const lat = coordinates.lat;
                const lng = coordinates.lng;

                // call the func getAltitude & getAddress
                getAltitude(lat, lng);
                getAddress(lat, lng);

                $('#latitude').val(lat);
                $('#longitude').val(lng);
            }
            // Condition type polygon
            if (type == 'polygon') {
                // Take coordinate from draw element on JSON format
                const aoi = layer.toGeoJSON().geometry;
                $('#aoi').val(JSON.stringify(aoi));

                //Calculate and display the wide area
                const area = turf.area(layer.toGeoJSON());
                $('#wide').val(area.toFixed(2));
            }
        });

        // Edit data geojson
        map.on('draw:edited', function(e) {
            const editedLayers = e.layers;
            editedLayers.eachLayer(function(layer) {
                const type = layer instanceof L.Marker ? 'marker' :
                    'polygon'; // Determine the edited shape type

                if (type === 'marker') {
                    // Extract coordinates from the layer options
                    const coordinates = layer.getLatLng();
                    const lat = coordinates.lat;
                    const lng = coordinates.lng;

                    // call the func getAltitude & getAddress
                    getAltitude(lat, lng);
                    getAddress(lat, lng);

                    $('#latitude').val(lat);
                    $('#longitude').val(lng);
                }

                // Condition type polygon
                if (type == 'polygon') {
                    // Take coordinate from draw element on JSON format
                    const aoi = layer.toGeoJSON().geometry;
                    $('#aoi').val(JSON.stringify(aoi));

                    //Calculate and display the area
                    const area = turf.area(layer.toGeoJSON());
                    $('#wide').val(area.toFixed(2));
                }
            });
        });

        // Delete data geojson
        map.on('draw:deleted', function(e) {
            const deletedLayers = e.layers;
            deletedLayers.eachLayer(function(layer) {
                $('#latitude').val('');
                $('#longitude').val('');
                $('#altitude').val('');
                $('#address').val('');
                $('#aoi').val('');
                $('#wide').val('');
            });
        });
    </script>
@endsection
