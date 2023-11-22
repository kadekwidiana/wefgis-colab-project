@extends('backpage.layouts.main')

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
                        <span
                            class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
                            1
                        </span>
                        Personal <span class="hidden sm:inline-flex sm:ms-2">Info</span>
                        <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                        </svg>
                    </li>
                    <li id="stepper2" class="flex items-center">
                        <span
                            class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                            2
                        </span>
                        Account <span class="hidden sm:inline-flex sm:ms-2">Info</span>
                        <svg class="w-3 h-3 ms-2 sm:ms-4 rtl:rotate-180" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 12 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m7 9 4-4-4-4M1 9l4-4-4-4" />
                        </svg>
                    </li>
                    <li id="stepper3" class="flex items-center">
                        <span
                            class="flex items-center justify-center w-5 h-5 me-2 text-xs border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                            3
                        </span>
                        Review
                    </li>
                </ol>
            </div>

        </div>

        <form>
            <!-- best seller & traffic -->
            <div id="form-section1" class="grid grid-cols-2 lg:grid-cols-1 gap-5 mt-2">
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
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Address
                            </label>
                            <input type="text" id="river"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Address" required>
                        </div>
                        <div class="mb-3">
                            <label for="river"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Geometry
                            </label>
                            <textarea name="" id="" cols="10" rows="3"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Geometry"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="river" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Wide
                            </label>
                            <input type="text" id="river"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Wide" required>
                        </div>

                        {{-- <div class="flex justify-end space-x-4">
                            <button type="submit" class="btn-bs-primary">Submit</button>
                            <button type="submit" class="btn-bs-primary">Submit</button>
                        </div> --}}
                        <a href="#step2" onclick="showSection2()"
                            class="btn-bs-success ml-auto lg:mr-0 lg:mb-6 px-2 w-24">Next</a>
                    </div>
                </div>
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
                            <a href="#step1" onclick="showSection1()"
                                class="btn-bs-danger ml-auto mr-2 lg:mr-0 lg:mb-6 px-2 w-24">Back</a>
                            <a href="#step3" onclick="showSection3()"
                                class="btn-bs-success ml-auto mr-2 lg:mr-0 lg:mb-6 px-2 w-24">Next</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- end best seller & traffic -->
            <!-- best seller & traffic -->
            <div id="form-section3" style="display: none;" class="grid grid-cols-2 lg:grid-cols-1 gap-5 mt-2    ">
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
            </div>
            <!-- end best seller & traffic -->
        </form>
    </div>
    </div>
    <!-- end content -->
    <script>
        // Function to show the "Next" div and hide the "Back" div
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
        $(document).ready(function() {
            showSection1();
        });
    </script>
@endsection
