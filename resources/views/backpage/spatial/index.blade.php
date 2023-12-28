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
    {{-- button modal pop up --}}
    {{-- <div>
        <button id="modalButton" class="btn hidden" onclick="openModal()">Open Modal</button>
        <!-- Modal -->
        <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
            <div class="modal-box">
                <h3 class="font-bold text-lg">Hello!</h3>
                <p class="py-4" id="modalMessage">Press ESC key or click the button below to close</p>
                <div class="modal-action">
                    <form method="dialog">
                        <button class="btn items-end" onclick="closeModal()">Close</button>
                    </form>
                </div>
            </div>
        </dialog>
    </div> --}}

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
                <div class="flex justify-between items-center card-header">
                    <h1 class="h4">List Data</h1>

                    <a href="/spatial/create" class="btn-bs-primary mr-6 lg:mr-0 lg:mb-6">Add Data</a>

                </div>
                <table class="table-auto w-full text-left">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 border-r">No</th>
                            <th class="px-4 py-2 border-r">Group Name</th>
                            <th class="px-4 py-2 border-r">Name</th>
                            <th class="px-4 py-2 border-r">Url Wms</th>
                            <th class="px-4 py-2 border-r">Attribute</th>
                            <th class="px-4 py-2 border-r">Description</th>
                            <th class="px-4 py-2 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-gray-600 overflow-hidden">
                        @foreach ($spatials as $spatial)
                            @php
                                $nomor_item = $loop->iteration + $spatials->firstItem() - 1;
                            @endphp
                            <tr class = "normal-case">
                                <td class="border border-l-0 px-4 py-2">{{ $nomor_item }}</td>
                                <td class="border border-l-0 px-4 py-2">{{ $spatial->spatialGroup->name }}</td>
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
                                        <form id="deleteForm" action="{{ route('spatial.destroy', $spatial->sp_id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class=" p-2" onclick="confirmDelete()"><i
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
        {{-- <div id="deleteConfirmationModal"
            class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 z-50 justify-center items-center">
            <div class="bg-white p-8 rounded shadow-md">
                <h2 class="text-2xl font-semibold mb-4">Delete Confirmation</h2>
                <p class="mb-4">Are you sure you want to delete this data?</p>
                <div class="flex justify-end">
                    <button id="confirmBtn" class="bg-red-500 text-white px-4 py-2 rounded mr-2">Delete</button>
                    <button id="cancelBtn" class="bg-gray-400 text-white px-4 py-2 rounded">Cancel</button>
                </div>
            </div>
        </div> --}}
        <div class="flex justify-end items-end p-2">
            {{ $spatials->links() }}
        </div>
    </div>
    <!-- end content -->
@endsection


@push('addon-script')
    <script>
        function confirmDelete() {
            // Menampilkan modal konfirmasi penghapusan
            let modalDelete = document.getElementById('popup-modal')
            let confirmDeleteButton = document.getElementById('confirm-delete-button')
            let cancelDeleteButton = document.getElementById('cancel-delete-button')
            let closeModalDelete = document.getElementById('close-modal')
            modalDelete.classList.remove('hidden');



            // Mengganti onclick pada tombol konfirmasi dalam modal untuk menjalankan submit form
            confirmDeleteButton.onclick = function() {
                document.getElementById('deleteForm').submit();
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
