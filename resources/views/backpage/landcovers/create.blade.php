@extends('backpage.layouts.main')

@section('content')
    <!-- strat content -->
    <div class="bg-gray-100 flex-1 p-6 md:mt-16">
        <!-- Start Recent Sales -->
        <div class="card col-span-2 xl:col-span-1">
            <div class="flex justify-between items-center card-header">
                <h1 class="h5">Add Data</h1>
            </div>
        </div>

        <div class="grid grid-cols-3 lg:grid-cols-1 gap-5 mt-2">
            <form id="form-create" method="POST" action="{{ route('landcover.store') }}">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="type"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Type</label>
                            <div>
                                <select id="type" name="type"
                                    class="form-input1 shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    required>
                                    <option value="" disabled selected>Select Type</option>
                                    
                                    <option value="agriculture">Agriculture</option>
                                    <option value="water">Water</option>
                                    <option value="building">Building</option>
                                    <option value="forest">Forest</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="landcover"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Landcover
                            </label>
                            <input type="text" id="landcover"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Name Landcover" required name="landcover">
                        </div>
                        <div class="mb-3">
                            <label for="active"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Icon
                            </label>
                            <input type="text" id="icon"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Name Icon" required name="icon">
                        </div>
                        <button type="submit" class="btn-bs-primary ml-auto lg:mr-0 lg:mb-6 px-2 w-24">Submit</button>
                    </div>
                </div>
            </form>
            <div class="card col-span-2" id="map" style="z-index: 2;">
                <div class="card-body">

                </div>
            </div>
        </div>


    </div>
    <!-- end content -->
@endsection
@push('addon-script')
    
@endpush
