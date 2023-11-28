@extends('backpage.layouts.main')

@section('content')
    <!-- strat content -->
    <div class="bg-gray-100 flex-1 p-6 md:mt-16">

        <!-- start quick Info -->
        <div class="grid grid-cols-2 gap-6 mt-6 xl:grid-cols-1">


            <!-- Start Recent Sales -->
            <div class="card col-span-2 xl:col-span-1">
                <div class="flex justify-between items-center card-header">
                    <h1 class="h4">List Data</h1>

                    <a href="/water/create" class="btn-bs-primary mr-6 lg:mr-0 lg:mb-6">Add Data</a>

                </div>
                <table class="table-auto w-full text-left">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-r">No</th>
                            <th class="px-4 py-2 border-r">Name</th>
                            <th class="px-4 py-2 border-r">Regency</th>
                            <th class="px-4 py-2 border-r">Photo</th>
                            <th class="px-4 py-2 border-r">Status</th>
                            <th class="px-4 py-2 border-r">Description</th>
                            <th class="px-4 py-2 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600">
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($waters as $water)
                            <tr>
                                <td class="border border-l-0 px-4 py-2">{{ $no++ }}</td>
                                <td class="border border-l-0 px-4 py-2">{{ $water->name }}</td>
                                <td class="border border-l-0 px-4 py-2">{{ $water->regency->regency }},
                                    {{ $water->regency->province }}</td>
                                <td class="border border-l-0 px-4 py-2"><img src="{{ asset('storage/' . $water->photo) }}"
                                        width="200" alt=""></td>
                                <td class="border border-l-0 px-4 py-2">{{ $water->status_area }}</td>
                                <td class="border border-l-0 px-4 py-2">{{ $water->description }}</td>
                                <td class="border border-l-0 border-r-0 px-4 py-2">

                                    <div class="flex justify-center items-center gap-2">
                                        <a href="{{ route('water.edit', $water->water_id) }}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <form action="{{ route('water.destroy', $water->water_id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                onclick="return confirm('Do you want to delete this data?')"><i
                                                    class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>

                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- End Recent Sales -->


        </div>
        <!-- end quick Info -->


    </div>
    <!-- end content -->
@endsection
