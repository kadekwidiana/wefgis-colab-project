@extends('backpage.layouts.main')

@section('content')
    <div>
        <button id="modalButton" class="btn hidden" onclick="openModal()">Open Modal</button>
        <!-- Modal -->
        <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
            <div class="modal-box">
                <h3 class="font-bold text-lg">Succes</h3>
                <p class="py-4" id="modalMessage">Data berhasil di buat</p>
                <div class="modal-action flex justify-end"> <!-- Tambahkan class "flex justify-end" -->
                    <form method="dialog">
                        <button class="btn" onclick="closeModal()">Close</button>
                    </form>
                </div>
            </div>
        </dialog>
    </div>


    <!-- strat content -->
    <div class="bg-gray-100 flex-1 p-6 md:mt-16">

        <!-- start quick Info -->
        <div class="grid grid-cols-2 gap-6 mt-6 xl:grid-cols-1">


            <!-- Start Recent Sales -->
            <div class="card col-span-2 xl:col-span-1">
                <h1 class="h4 ml-6">List Data</h1>

                <div class="flex justify-between items-center card-header gap-4">
                    <div class="flex-grow">
                        <form class="" action="{{ route('spatial.index') }}">
                            <label for="default-search"
                                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Cari</label>
                            <div class="relative flex items-center">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                                <div class="w-[600px]">
                                    <input type="search" id="default-search"
                                        class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Cari Nama..." name="search" value="{{ request('search') }}">
                                </div>
                                <button id="buttonSearch" type="submit"
                                    class="text-white ml-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-20">Cari</button>
                            </div>
                        </form>
                    </div>


                    <div class="flex justify-center items-center">
                        <a href="/spatial/create" class="btn-bs-primary mr-6 lg:mr-0 lg:mb-6">Add Data</a>
                    </div>

                </div>



                <table class="table-auto w-full text-left">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-r">Group id</th>
                            <th class="px-4 py-2 border-r">Name</th>
                            <th class="px-4 py-2 border-r">Url</th>
                            <th class="px-4 py-2 border-r">attribute</th>
                            <th class="px-4 py-2 border-r">Description</th>
                            <th class="px-4 py-2 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 overflow-hidden">
                        @foreach ($spatials as $spatial)
                            <tr class = "normal-case">
                                <td class="border border-l-0 px-4 py-2">{{ $spatial->group_id }}</td>
                                <td class="border border-l-0 px-4 py-2">
                                    <a href="{{ route('spatial.show', $spatial->sp_id) }}">{{ $spatial->name }}</a>
                                </td>
                                <td class="border border-l-0 px-4 py-2 max-w-xs break-all">{{ $spatial->url }}</td>
                                <td class="border border-l-0 px-4 py-2">{{ $spatial->attribute }}</td>
                                <td class="border border-l-0  px-4 py-2">{{ $spatial->description }}</td>
                                <td class="border border-l-0 border-r-0 px-4 py-2">

                                    <div class="flex justify-center items-center gap-2">
                                        <a href="{{ route('spatial.edit', $spatial->sp_id) }}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <form id="deleteForm_{{ $spatial->sp_id }}"
                                            action="{{ route('spatial.destroy', $spatial->sp_id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class=" p-2"
                                                onclick="showDeleteConfirmationModal({{ $spatial->sp_id }})"><i
                                                    class="fas fa-trash"></i></button>
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

        {{-- confirmation box --}}

        <div class="flex justify-end items-end p-2">
            {{ $spatials->links() }}
        </div>
    </div>
    <!-- end content -->
@endsection


@push('addon-script')
    <script>
        function showDeleteConfirmationModal(groupId) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You won\'t be able to revert this!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {

                    document.getElementById('deleteForm_' + groupId).submit();
                }
            });
        }
    </script>
@endpush
