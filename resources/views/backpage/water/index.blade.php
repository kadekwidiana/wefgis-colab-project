@extends('backpage.layouts.main')
@push('addon-style')
    <style>
        #popup-modal.fixed {
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
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
    {{-- modal delete  --}}
    {{-- modal success --}}
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
                <h1 class="h4 ml-4 my-2">List Data</h1>
                <div class="flex justify-between items-center card-header gap-4">
                    <div class="flex-grow">
                        <form class="" action="{{ route('water.index') }}">
                            <label for="default-search"
                                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                            <div class="relative flex items-center">
                                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </div>
                                <div class="w-[600px]">
                                    <input type="search" id="default-search"
                                        class="block w-full p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                        placeholder="Search data...." name="search" value="{{ request('search') }}">
                                </div>
                                <button id="buttonSearch" type="submit"
                                    class="text-white ml-2 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-20">Search</button>
                            </div>
                        </form>
                    </div>


                    <div class="flex justify-center items-center">
                        <a href="/water/create" class="btn-bs-primary px-4 py-2 items-center  mr-6 lg:mr-0 lg:mb-6">Add
                            Data</a>
                    </div>


                </div>
                <table class="table-auto w-full text-left">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-r">No</th>
                            <th class="px-4 py-2 border-r">Name</th>
                            <th class="px-4 py-2 border-r">Regency</th>
                            {{-- <th class="px-4 py-2 border-r">Photo</th> --}}
                            <th class="px-4 py-2 border-r">Status</th>
                            <th class="px-4 py-2 border-r">Description</th>
                            <th class="px-4 py-2 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600">
                        {{-- @php
                            $no = 1;
                        @endphp --}}
                        @foreach ($waters as $water)
                            @php
                                $nomor_item = $loop->iteration + $waters->firstItem() - 1;
                            @endphp
                            <tr class = "normal-case">
                                <td class="border border-l-0 px-4 py-2">{{ $nomor_item }}</td>
                                <td class="border border-l-0 px-4 py-2">{{ $water->name }}</td>
                                <td class="border border-l-0 px-4 py-2">{{ $water->regency->regency }}</td>
                                {{-- <td class="border border-l-0 px-4 py-2"><img src="{{ asset('storage/' . $water->photo) }}"
                                        width="200" alt=""></td> --}}
                                <td class="border border-l-0 px-4 py-2">{{ $water->status_area }}</td>
                                <td class="border border-l-0 px-4 py-2">{{ $water->description }}</td>
                                <td class="border border-l-0 border-r-0 px-4 py-2">

                                    <div class="flex justify-center items-center gap-2">
                                        <a href="{{ route('water.edit', $water->water_id) }}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <form id="form-delete" action="{{ route('water.destroy', $water->water_id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            {{-- <button type="submit"
                                                onclick="return confirm('Do you want to delete this data?')"><i
                                                    class="fas fa-trash"></i>
                                            </button> --}}
                                            <button type="button" onclick="confirmDelete()">
                                                <i class="fas fa-trash"></i>
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

        {{-- <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
            class=" mt-5 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
            type="button">
            Toggle modal
        </button> --}}



        <div class="flex justify-end items-end p-2">
            {{ $waters->links() }}
        </div>

    </div>




    <!-- end content -->

    {{-- modal delete button --}}
@endsection

@push('addon-script')
    <script>
        $('#buttonSearch').on('click', function() {
            // $value = $('#default-search').val();
            // alert($value)

            // $.ajax({
            //     type: "get",
            //     url: {{ route('water.index') }},
            //     data: {'search':$value},
            //     // dataType: "dataType",
            //     success: function (data) {
            //         console.log(data)
            //     }
            // });


        });

        function confirmDelete() {
            // Menampilkan modal konfirmasi penghapusan
            let modalDelete = document.getElementById('popup-modal')
            let confirmDeleteButton = document.getElementById('confirm-delete-button')
            let cancelDeleteButton = document.getElementById('cancel-delete-button')
            let closeModalDelete = document.getElementById('close-modal')
            modalDelete.classList.remove('hidden');



            // Mengganti onclick pada tombol konfirmasi dalam modal untuk menjalankan submit form
            confirmDeleteButton.onclick = function() {
                document.getElementById('form-delete').submit();
            };
            cancelDeleteButton.onclick = function() {
                modalDelete.classList.add('hidden')
            }
            closeModalDelete.onclick = function() {
                modalDelete.classList.add('hidden')
            }
        }

        function openModal() {
            const modal = document.getElementById('my_modal_5');
            modal.showModal();
        }

        function closeModal() {
            const modal = document.getElementById('my_modal_5');
            modal.close();
        }

        // Check for success message and toggle modal visibility
        const successMessage = "{{ session('success') }}";
        const modalButton = document.getElementById('modalButton');
        const modalMessage = document.getElementById('modalMessage');

        if (successMessage) {
            // If success message exists, update modal message and show modal
            modalMessage.innerText = successMessage;
            openModal();
        } else {
            // If no success message, hide the modal button
            modalButton.setAttribute('hidden', true);
        }

        // Fungsi untuk menampilkan modal
        function showDeleteConfirmationModal() {
            let modal = document.getElementById('deleteConfirmationModal');
            modal.classList.remove('hidden');
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Dapatkan tombol-tombol di dalam modal
            let confirmBtn = document.getElementById('confirmBtn');
            let cancelBtn = document.getElementById('cancelBtn');
            let deleteForm = document.getElementById('deleteForm');
            let modal = document.getElementById('deleteConfirmationModal');

            // Tambahkan event listener untuk tombol-tombol
            confirmBtn.addEventListener('click', function() {
                // Submit formulir saat tombol Delete di dalam modal diklik
                deleteForm.submit();
            });

            cancelBtn.addEventListener('click', function() {
                // Sembunyikan modal saat tombol Cancel di dalam modal diklik
                modal.classList.add('hidden');
            });
        });
    </script>
@endpush
