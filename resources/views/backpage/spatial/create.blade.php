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
        
            <div class="grid grid-cols-2 lg:grid-cols-1 gap-5 mt-2">
                <form id="form-create" method="POST" action="{{ route('spatial.store') }}">
                    @csrf
                    <div class="card">
                        <div class="card-body">
                            <div class="mb-3">
                                <label for="group_id"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Group
                                    id </label>
                                <select id="group_id"
                                    class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    required name="group_id">
                                    <option value="" disabled selected>Select Group</option>
                                    @foreach ($spatialGroups as $spatialGroup)
                                        <option value="{{ $spatialGroup->group_id }}">{{ $spatialGroup->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="name_spatial"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Name
                                </label>
                                <input type="text" id="name_spatial"
                                    class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="Name" required name="name">
                            </div>
                            <div class="mb-3">
                                <label for="spatial_url"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Url
                                </label>
                                <input type="text" id="spatial_url"
                                    class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="Url" name="url" required>
                            </div>
                            <div class="mb-3">
                                <label for="spatial_attribute"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">attribute
                                </label>
                                <input type="text" id="spatial_attribute"
                                    class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="Attribute" name="attribute" required>
                            </div>
                            <div class="mb-3">
                                <label for="description"
                                    class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Description
                                </label>
                                <textarea id="" cols="10" rows="3"
                                    class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="Description" name="description"></textarea>
                            </div>
                            <button type="submit" class="btn-bs-primary ml-auto lg:mr-0 lg:mb-6 px-2 w-24">Submit</button>
                        </div>
                    </div>
                </form>
                <div class="card" id="map" style="z-index: 2;">
                    <div class="card-body">

                    </div>
                </div>

            </div>

         {{-- form create data spatial --}}

        {{-- <form id="form-create" method="POST" action="{{ route('spatial.store') }}">
            @csrf
           
            <div class="grid grid-cols-2 lg:grid-cols-1 gap-5 mt-2">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="group_id" class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Group
                                id </label>
                            <select id="group_id"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                required>
                                <option value="" disabled selected>Select Group</option>
                                @foreach ($spatialGroups as $spatialGroup)
                                    <option value="{{ $spatialGroup->group_id }}">{{ $spatialGroup->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="name_spatial"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Name
                            </label>
                            <input type="text" id="name_spatial"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Name" required name="name">
                        </div>
                        <div class="mb-3">
                            <label for="spatial_url"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Url
                            </label>
                            <input type="text" id="spatial_url"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Url" name="url" required>
                        </div>
                        <div class="mb-3">
                            <label for="spatial_attribute"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">attribute
                            </label>
                            <input type="text" id="spatial_attribute"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Attribute" name="attribute" required>
                        </div>
                        <div class="mb-3">
                            <label for="description"
                                class="block mb-1 text-sm font-medium text-gray-900 dark:text-white">Description
                            </label>
                            <textarea id="" cols="10" rows="3"
                                class="shadow-sm bg-gray-50 border border-gray-400 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                placeholder="Description" name="description"></textarea>
                        </div>
                        <button type="submit" class="btn-bs-primary ml-auto lg:mr-0 lg:mb-6 px-2 w-24">Submit</button>
                    </div>
                </div>

                <div class="card" id="map" style="z-index: 2;">
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </form> --}}
    </div>
    </div>
    <!-- end content -->
    {{-- <script>
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
    </script> --}}
@endsection
