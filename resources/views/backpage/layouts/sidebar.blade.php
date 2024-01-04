<!-- start sidebar -->
{{-- <div id="sideBar"
    class="relative flex flex-col flex-wrap bg-white border-r border-gray-300 p-6 flex-none w-64 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster">


    <!-- sidebar content -->
    <div class="flex flex-col">

        <!-- sidebar toggle -->
        <div class="text-right hidden md:block mb-4">
            <button id="sideBarHideBtn">
                <i class="fad fa-times-circle"></i>
            </button>
        </div>
        <!-- end sidebar toggle -->

        <p class="uppercase text-xs text-gray-600 mb-4 tracking-wider">homes</p>

        <!-- link -->
        <a href="/dashboard"
            class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-chart-pie text-xs mr-2"></i>
            Dashboard
        </a>
        <!-- end link -->

        <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">data area</p>

        <!-- link -->
        <a href="/water"
            class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-envelope-open-text text-xs mr-2"></i>
            water
        </a>
        <!-- end link -->

        <!-- link -->
        <a href="{{ route('regency.index') }}"
            class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-comments text-xs mr-2"></i>
            Regency
        </a>
        <!-- end link -->

        <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">Spatial Data</p>

        <!-- link -->
        <a href="./email.html"
            class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-envelope-open-text text-xs mr-2"></i>
            Land Use
        </a>
        <!-- end link -->
        <!-- link -->
        <a href="{{ route('landcover.index') }}"
            class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-envelope-open-text text-xs mr-2"></i>
            Land Cover
        </a>
        <!-- end link -->
        <!-- link -->
        <a href="{{ route('spatialGroup.index') }}"
            class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-envelope-open-text text-xs mr-2"></i>
            spatial grup
        </a>
        <!-- end link -->

        <!-- link -->
        <a href="/spatial"
            class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500">
            <i class="fad fa-comments text-xs mr-2"></i>
            spatial
        </a>
        <!-- end link -->


    </div>
    <!-- end sidebar content -->

</div> --}}
<!-- end sidbar -->
<!-- start sidebar -->
<div id="sideBar"
    class="relative flex flex-col flex-wrap bg-white border-r border-gray-300 p-6 flex-none w-64 md:-ml-64 md:fixed md:top-0 md:z-30 md:h-screen md:shadow-xl animated faster">

    <!-- sidebar content -->
    <div class="flex flex-col">

        <!-- sidebar toggle -->
        <div class="text-right hidden md:block mb-4">
            <button id="sideBarHideBtn">
                <i class="fad fa-times-circle"></i>
            </button>
        </div>
        <!-- end sidebar toggle -->

        <p class="uppercase text-xs text-gray-600 mb-4 tracking-wider">homes</p>

        <!-- link -->
        <a href="/dashboard"
            class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500 {{ Request::is('dashboard*') ? 'bg-blue-500 text-white rounded-md p-2' : '' }}">
            <i class="fad fa-chart-pie text-xs mr-2"></i>
            Dashboard
        </a>
        <!-- end link -->

        <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">data area</p>

        <!-- link -->
        <a href="/water"
            class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500 {{ Request::is('water*') ? 'bg-blue-500 text-white rounded-md p-2' : '' }}">
            <i class="fad fa-envelope-open-text text-xs mr-2"></i>
            water
        </a>
        <!-- end link -->

        <!-- link -->
        <a href="{{ route('regency.index') }}"
            class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500 {{ Request::is('regency*') ? 'bg-blue-500 text-white rounded-md p-2' : '' }} ">
            <i class="fad fa-comments text-xs mr-2"></i>
            Regency
        </a>
        <!-- end link -->

        <!-- ... (sisa link) ... -->

        <p class="uppercase text-xs text-gray-600 mb-4 mt-4 tracking-wider">Spatial Data</p>

        <!-- link -->
        <a href="./email.html"
            class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500 {{ Request::is('land-use*') ? 'bg-blue-500 text-white rounded-md p-2' : '' }}">
            <i class="fad fa-envelope-open-text text-xs mr-2"></i>
            Land Use
        </a>
        <!-- end link -->

        <!-- link -->
        <a href="{{ route('landcover.index') }}"
            class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500 {{ Request::is('landcover*') ? 'bg-blue-500 text-white rounded-md p-2' : '' }}">
            <i class="fad fa-envelope-open-text text-xs mr-2"></i>
            Land Cover
        </a>
        <!-- end link -->

        <!-- link -->
        <a href="{{ route('spatialGroup.index') }}"
            class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500 {{ Request::is('spatialGroup*') ? 'bg-blue-500 text-white rounded-md p-2' : '' }}">
            <i class="fad fa-envelope-open-text text-xs mr-2"></i>
            Spatial Group
        </a>
        <!-- end link -->

        <!-- link -->
        {{-- <a href="/spatial"
            class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500{{ Request::is('spatial*') && !Request::is('spatialGroup*') ? 'bg-blue-500 text-white rounded-md p-2' : '' }}">
            <i class="fad fa-comments text-xs mr-2"></i>
            Spatial
        </a> --}}
        <a href="/spatial"
            class="mb-3 capitalize font-medium text-sm hover:text-teal-600 transition ease-in-out duration-500 {{ Request::is('spatial*') && !Request::is('spatialGroup*') ? 'bg-blue-500 text-white rounded-md p-2' : '' }}">
            <i class="fad fa-comments text-xs mr-2"></i>
            Spatial
        </a>
    </div>
    <!-- end sidebar content -->

</div>


<!-- end sidbar -->
