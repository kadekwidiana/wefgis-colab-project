@extends('backpage.layouts.main')

@section('content')
    <!-- strat content -->
    <div class="bg-gray-100 flex-1 p-6 md:mt-16">

        <!-- start quick Info -->
        <div class="grid grid-cols-2 gap-6 mt-6 xl:grid-cols-1">


            <!-- Start Recent Sales -->
            <div class="card col-span-2 xl:col-span-1">
                <div class="card-header">Recent Sales</div>

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
