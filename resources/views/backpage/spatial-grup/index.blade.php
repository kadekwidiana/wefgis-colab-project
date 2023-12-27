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
                <div class="flex justify-between items-center card-header">
                    <h1 class="h4">List Data</h1>

                    <a href="/spatial/create" class="btn-bs-primary mr-6 lg:mr-0 lg:mb-6">Add Data</a>

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
                        @foreach ($spatialGroups as $spatialGroup)
                            <tr class = "normal-case">
                                <td class="border border-l-0 px-4 py-2">{{ $spatialGroup->group_id }}</td>
                                <td class="border border-l-0 px-4 py-2">
                                    <a
                                        href="{{ route('spatialGroup.show', $spatialGroup->sp_id) }}">{{ $spatialGroup->name }}</a>
                                </td>
                                <td class="border border-l-0 px-4 py-2 max-w-xs break-all">{{ $spatialGroup->url }}</td>
                                <td class="border border-l-0 px-4 py-2">{{ $spatialGroup->attribute }}</td>
                                <td class="border border-l-0  px-4 py-2">{{ $spatialGroup->description }}</td>
                                <td class="border border-l-0 border-r-0 px-4 py-2">

                                    <div class="flex justify-center items-center gap-2">
                                        <a href="{{ route('spatialGroup.edit', $spatialGroup->sp_id) }}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <form id="deleteForm"
                                            action="{{ route('spatialGroup.destroy', $spatialGroup->sp_id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class=" p-2" onclick="showDeleteConfirmationModal()"><i
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
        <div id="deleteConfirmationModal"
            class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 z-50 justify-center items-center">
            <div class="bg-white p-8 rounded shadow-md">
                <h2 class="text-2xl font-semibold mb-4">Delete Confirmation</h2>
                <p class="mb-4">Are you sure you want to delete this data?</p>
                <div class="flex justify-end">
                    <button id="confirmBtn" class="bg-red-500 text-white px-4 py-2 rounded mr-2">Delete</button>
                    <button id="cancelBtn" class="bg-gray-400 text-white px-4 py-2 rounded">Cancel</button>
                </div>
            </div>
        </div>
        <div class="flex justify-end items-end p-2">
            {{-- {{ $spatialGroups->links() }} --}}
        </div>
    </div>
    <!-- end content -->
@endsection


@push('addon-script')
    <script>
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
