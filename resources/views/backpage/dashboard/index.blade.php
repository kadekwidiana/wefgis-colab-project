@extends('backpage.layouts.main')

@section('content')
    <!-- strat content -->
    <div class="bg-gray-100 flex-1 p-6 md:mt-16">

        <!-- start numbers -->
        <div class="grid grid-cols-5 gap-6 xl:grid-cols-2">

            <!-- card -->
            <div class="card mt-6">
                <div class="card-body flex items-center">

                    <div class="px-3 py-2 rounded bg-indigo-600 text-white mr-3">
                        <i class="fad fa-wallet"></i>
                    </div>

                    <div class="flex flex-col">
                        <h1 class="font-semibold"><span class="num-2"></span> Sales</h1>
                        <p class="text-xs"><span class="num-2"></span> payments</p>
                    </div>

                </div>
            </div>
            <!-- end card -->

            <!-- card -->
            <div class="card mt-6">
                <div class="card-body flex items-center">

                    <div class="px-3 py-2 rounded bg-green-600 text-white mr-3">
                        <i class="fad fa-shopping-cart"></i>
                    </div>

                    <div class="flex flex-col">
                        <h1 class="font-semibold"><span class="num-2"></span> Orders</h1>
                        <p class="text-xs"><span class="num-2"></span> items</p>
                    </div>

                </div>
            </div>
            <!-- end card -->

            <!-- card -->
            <div class="card mt-6 xl:mt-1">
                <div class="card-body flex items-center">

                    <div class="px-3 py-2 rounded bg-yellow-600 text-white mr-3">
                        <i class="fad fa-blog"></i>
                    </div>

                    <div class="flex flex-col">
                        <h1 class="font-semibold"><span class="num-2"></span> posts</h1>
                        <p class="text-xs"><span class="num-2"></span> active</p>
                    </div>

                </div>
            </div>
            <!-- end card -->

            <!-- card -->
            <div class="card mt-6 xl:mt-1">
                <div class="card-body flex items-center">

                    <div class="px-3 py-2 rounded bg-red-600 text-white mr-3">
                        <i class="fad fa-comments"></i>
                    </div>

                    <div class="flex flex-col">
                        <h1 class="font-semibold"><span class="num-2"></span> comments</h1>
                        <p class="text-xs"><span class="num-2"></span> approved</p>
                    </div>

                </div>
            </div>
            <!-- end card -->

            <!-- card -->
            <div class="card mt-6 xl:mt-1 xl:col-span-2">
                <div class="card-body flex items-center">

                    <div class="px-3 py-2 rounded bg-pink-600 text-white mr-3">
                        <i class="fad fa-user"></i>
                    </div>

                    <div class="flex flex-col">
                        <h1 class="font-semibold"><span class="num-2"></span> memebrs</h1>
                        <p class="text-xs"><span class="num-2"></span> online</p>
                    </div>

                </div>
            </div>
            <!-- end card -->

        </div>
        <!-- end nmbers -->

        <!-- start quick Info -->
        <div class="grid grid-cols-2 gap-6 mt-6 xl:grid-cols-1">


            <!-- Start Recent Sales -->
            <div class="card col-span-2 xl:col-span-1">
                <div class="flex justify-between items-center card-header">
                    <h1 class="h4">List Data</h1>

                    <a href="#" class="btn-bs-primary mr-6 lg:mr-0 lg:mb-6">Add Data</a>

                </div>
                <table class="table-auto w-full text-left">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-r">No</th>
                            <th class="px-4 py-2 border-r">product</th>
                            <th class="px-4 py-2 border-r">price</th>
                            <th class="px-4 py-2 border-r">date</th>
                            <th class="px-4 py-2">date</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600">

                        <tr>
                            <td class="border border-l-0 px-4 py-2">1</td>
                            <td class="border border-l-0 px-4 py-2">Lightning to USB-C Adapter Lightning.</td>
                            <td class="border border-l-0 px-4 py-2">$<span class="num-2"></span></td>
                            <td class="border border-l-0 px-4 py-2"><span class="num-2"></span>
                                minutes ago</td>
                            <td class="border border-l-0 border-r-0 px-4 py-2"><span class="num-2"></span>
                                minutes ago</td>
                        </tr>
                        <tr>
                            <td class="border border-l-0 px-4 py-2">2</td>
                            <td class="border border-l-0 px-4 py-2">Apple iPhone 8.</td>
                            <td class="border border-l-0 px-4 py-2">$<span class="num-2"></span></td>
                            <td class="border border-l-0 px-4 py-2"><span class="num-2"></span>
                                minutes ago</td>
                            <td class="border border-l-0 border-r-0 px-4 py-2"><span class="num-2"></span>
                                minutes ago</td>
                        </tr>

                    </tbody>
                </table>
            </div>
            <!-- End Recent Sales -->


        </div>
        <!-- end quick Info -->


    </div>
    <!-- end content -->
@endsection
