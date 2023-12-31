@extends('backpage.layouts.main')
@push('addon-style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        span.select2.select2-container.select2-container--classic {
            width: 100% !important;
        }
    </style>
@endpush
@section('modal')
    <div id="popup-modal" tabindex="-1" class="hidden flex items-center justify-center fixed inset-0 z-50 overflow-auto ">

        <div class="relative p-4 w-full max-w-md mx-auto max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button id="close-modal" type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg id="" class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to
                        delete
                        this data?</h3>
                    <button id="confirm-delete-button" data-modal-hide="popup-modal" type="button"
                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center me-2">
                        Yes, I'm sure
                    </button>
                    <button id="cancel-delete-button" data-modal-hide="popup-modal" type="button"
                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No,
                        cancel</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
    <!-- strat content -->
    <div class="bg-gray-100 flex-1 p-6 md:mt-16">
        <!-- Start Recent Sales -->
        <div class="card col-span-2 xl:col-span-1">
            <div class="flex justify-between items-center card-header">
                <h1 class="h5">Add Data</h1>
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

        <form action="{{ route('water.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <!-- best seller & traffic -->
            <div id="form-section1" class="grid grid-cols-3 lg:grid-cols-1 gap-5 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="name" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Name
                            </label>
                            <input type="text" id="name" name="name"
                                class="form-input1 shadow-sm bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light  @error('name')
                                     border-red-500
                                @enderror"
                                placeholder="Name" value="{{ old('name') }}">
                            @error('name')
                                <div>
                                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="regency_id"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Regency</label>
                            <div>
                                <select id="regency_id" name="regency_id"
                                    class="form-input1 shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    required>
                                    <option value="" disabled selected>Select Regency</option>
                                    @foreach ($regencies as $regency)
                                        <option value="{{ $regency->regency_id }}">{{ $regency->regency_id }}
                                            {{ $regency->regency }}</option>
                                    @endforeach
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="group_id"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Spatial Group</label>
                            <div>
                                <select id="group_id" name="group_id"
                                    class="form-input1 shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    required>
                                    <option value="" disabled selected>Select Spatial Group</option>
                                    @foreach ($spatialGroups as $spatialGroup)
                                        <option value="{{ $spatialGroup->group_id }}">{{ $spatialGroup->group_id }}
                                            {{ $spatialGroup->name }}</option>
                                    @endforeach
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                        </div>
                        <div class="flex space-x-4">
                            <div class="flex-1 mb-3">
                                <label for="latitude"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Latitude</label>
                                <input type="text" id="latitude" name="latitude"
                                    class="form-input1 shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="Latitude" required value="{{ old('latitude') }}" readonly>
                            </div>

                            <div class="flex-1 mb-3">
                                <label for="longitude"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Longitude</label>
                                <input type="text" id="longitude" name="longitude"
                                    class="form-input1 shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="Longitude" required value="{{ old('longtitude') }}" readonly>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="altitude"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Altitude
                            </label>
                            <input type="text" id="altitude" name="altitude"
                                class="form-input1 shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Altitude" required value="{{ old('altitude') }}" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="address"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Address
                            </label>
                            <textarea name="address" id="address" cols="10" rows="2"
                                class="form-input1 shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Address" readonly>{{ Request::old('address') }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="aoi"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Geometry
                            </label>
                            <textarea name="aoi" id="aoi" cols="10" rows="3"
                                class="form-input1 shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Geometry" value="{{ old('aoi') }}" readonly>{{ Request::old('aoi') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="wide"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Wide
                            </label>
                            <input type="text" id="wide" name="wide"
                                class="form-input1 shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Wide" required value="{{ old('wide') }}" readonly>
                        </div>

                        {{-- <div class="flex justify-end space-x-4">
                            <button type="submit" class="btn-bs-primary">Submit</button>
                            <button type="submit" class="btn-bs-primary">Submit</button>
                        </div> --}}
                        {{-- <a href="#step2" onclick="showSection2()"
                            class="btn-bs-success ml-auto lg:mr-0 lg:mb-6 px-2 w-24">Next</a> --}}
                        <a href="#step2" id="btnNext1"
                            class="btn-bs-success ml-auto lg:mr-0 lg:mb-6 px-2 w-24">Next</a>

                    </div>
                </div>
                {{-- maps display --}}
                <div class="card col-span-2" id="map" style="z-index: 2;">
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
                                class="shadow-sm bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light  @error('ownership')
                                     border-red-500
                                @enderror"
                                placeholder="Ownership" required value="{{ old('ownership') }}">
                            @error('ownership')
                                <div>
                                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                </div>
                            @enderror

                        </div>
                        <div class="mb-3">
                            <label for="status_area"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Status Area
                            </label>
                            <div class="flex gap-4">
                                <div class="flex items-center me-4 gap-2">
                                    <input id="inline-radio" type="radio" value="private" name="status_area"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="inline-radio"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Private</label>
                                </div>
                                <div class="flex items-center me-4 gap-2">
                                    <input id="inline-radio" type="radio" value="public" name="status_area"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="inline-radio"
                                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Public</label>
                                </div>

                            </div>

                        </div>

                        <div class="mb-3">
                            <div>
                                <label for="photo"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo
                                </label>
                                <img class="img-preview1 img-fluid mb-3 col-sm-5">
                                <input type="file" id="photo" name="photo"
                                    onchange="previewImage('#photo', '.img-preview1')"
                                    class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="Photo" required>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="related_photo"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Related Photo
                            </label>
                            <img class="img-preview2 img-fluid mb-3 col-sm-5">
                            <input type="file" id="related_photo" name="related_photo"
                                onchange="previewImage('#related_photo', '.img-preview2')"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Related Photo" required>
                        </div>
                        {{-- <div class="hidden mb-3">
                            <label for="related_photo"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">related_photo
                            </label>
                            <input type="text" id="related_photo" name="related_photo"
                                class="shadow-sm bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light  @error('related_photo')
                                     border-red-500
                                @enderror"
                                placeholder="related_photo" required value="-">
                            @error('related_photo')
                                <div>
                                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                </div>
                            @enderror

                        </div> --}}
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">

                        <div class="flex space-x-4">
                            <div class="flex-1 mb-3">
                                <label for="lc_id"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Land Cover</label>
                                <select id="lc_id" name="lc_id"
                                    class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    required>

                                    <option value="" disabled selected>select Land Cover</option>
                                    @foreach ($landCovers as $lc)
                                        <option value="{{ $lc->lc_id }}">{{ $lc->lc_id }} {{ $lc->landcover }}
                                            type:
                                            {{ $lc->type }}</option>
                                    @endforeach
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                            {{-- <div class="hidden mb-3">
                                <label for="lc_id"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">lc_id
                                </label>
                                <input type="text" id="lc_id" name="lc_id"
                                    class="shadow-sm bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light  @error('lc_id')
                                         border-red-500
                                    @enderror"
                                    placeholder="lc_id" required value="1">
                                @error('lc_id')
                                    <div>
                                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                    </div>
                                @enderror

                            </div> --}}

                            <div class="flex-1 mb-3">
                                <label for="lu_id"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Land Use</label>

                                <select id="lu_id"
                                    class=" land-use-select shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    required name="lu_id[]" multiple>

                                    @foreach ($landUses as $lu)
                                        <option class="lu_option" value="{{ $lu->lu_id }}">{{ $lu->lu_id }}
                                            {{ $lu->landuse }}
                                        </option>
                                    @endforeach
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                            {{-- <div class="hidden mb-3">
                                <label for="lu_id"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">lu_id
                                </label>
                                <input type="text" id="lu_id" name="lu_id"
                                    class="shadow-sm bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light  @error('lu_id')
                                         border-red-500
                                    @enderror"
                                    placeholder="lu_id" required value="1">
                                @error('lu_id')
                                    <div>
                                        <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                    </div>
                                @enderror

                            </div> --}}
                        </div>
                        <div class="mb-3">
                            <label for="permanence"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Permanence
                            </label>
                            <input type="text" id="permanence" name="permanence"
                                class="shadow-sm bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light  @error('permanence')
                                     border-red-500
                                @enderror"
                                placeholder="Permanence" required value="">
                            @error('permanence')
                                <div>
                                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                </div>
                            @enderror
                        </div>

                        {{-- <div class="mb-3">
                            <div>
                                <label for="photo"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Photo
                                </label>
                                <img class="img-preview1 img-fluid mb-3 col-sm-5">
                                <input type="file" id="photo" name="photo"
                                    onchange="previewImage('#photo', '.img-preview1')"
                                    class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="Photo" required>
                            </div>
                        </div> --}}

                        <div class="mb-3">
                            <label for="description"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Description
                            </label>
                            <textarea name="description" id="description" cols="10" rows="3"
                                class="shadow-sm bg-gray-50 border  text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light  @error('description')
                                     border-red-500
                                @enderror"
                                placeholder="Description" value="{{ old('description') }}">{{ Request::old('description') }}</textarea>
                            @error('description')
                                <div>
                                    <p class="text-sm text-red-500 mt-1">{{ $message }}</p>
                                </div>
                            @enderror
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
        </form>
    </div>
    </div>
    <!-- end content -->

    {{-- IMPORT SCRIPT --}}
    @include('backpage.package.package-js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        function previewImage(img, preview) {
            const image = document.querySelector(img);
            const imgPreview = document.querySelector(preview);
            imgPreview.style.display = 'block';
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
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

        let isValid = true;

        function validateInput() {
            $('.error-message').remove();
            isValid = true;

            $('.form-input1').each(function() {
                let inputValue = $(this).val().trim();

                // Memeriksa apakah nilai input kosong
                if (inputValue === '') {
                    isValid = false;
                    // Tambahkan pesan error di bawah input yang tidak valid
                    let errorMessage = $('<div>').addClass('text-sm text-red-500 mt-1 error-message').text(
                        'Mohon isi kolom ini.');
                    $(this).parent().append(errorMessage);
                    // Tambahkan kelas untuk menandai input yang tidak valid
                    $(this).addClass('border-red-500');
                } else {
                    // Reset tampilan dan kelas input jika input valid
                    $(this).removeClass('border-red-500');
                }
            });
            return isValid;
        }

        // Menambahkan event listener untuk memantau perubahan pada input
        $('.form-input1').on('input', function() {
            // Validasi akan dipanggil setiap kali ada perubahan pada input
            validateInput();
        });

        $('#btnNext1').on('click', function() {
            // Panggil fungsi validasi saat tombol "Next" diklik
            if (validateInput()) {
                // Logika untuk melanjutkan ke langkah berikutnya jika formulir valid
                $('#form-section3').hide();
                $('#form-section2').show();
                $('#form-section1').hide();
                $('#stepper3').removeClass('text-blue-600 dark:text-blue-500');
                $('#stepper2').addClass('text-blue-600 dark:text-blue-500');
                $('#stepper1').addClass('text-blue-600 dark:text-blue-500');
            }
        });

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

        // Maps Leaflet
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
