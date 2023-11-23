@extends('backpage.layouts.main')

@section('content')
    {{-- button modal pop up --}}
    <div>
        <button id="modalButton" class="btn hidden" onclick="openModal()">Open Modal</button>
        <!-- Modal -->
        <dialog id="my_modal_5" class="modal modal-bottom sm:modal-middle">
            <div class="modal-box">
                <h3 class="font-bold text-lg">Hello!</h3>
                <p class="py-4" id="modalMessage">Press ESC key or click the button below to close</p>
                <div class="modal-action">
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
                    <tbody class="text-gray-600">
                        @foreach ($spatials as $spatial)
                            <tr>
                                <td class="border border-l-0 px-4 py-2">{{ $spatial->group_id }}</td>
                                <td class="border border-l-0 px-4 py-2">{{ $spatial->name }}</td>
                                <td class="border border-l-0 px-4 py-2">{{ $spatial->url }}</td>
                                <td class="border border-l-0 px-4 py-2">{{ $spatial->attribute }}</td>
                                <td class="border border-l-0  px-4 py-2">{{ $spatial->description }}</td>
                                <td class="border border-l-0 border-r-0 px-4 py-2">

                                    <div class="flex justify-center items-center gap-2">
                                        <a href="{{ route('spatial.edit', $spatial->sp_id) }}">
                                            <i class="far fa-edit"></i>
                                        </a>
                                        <a href="/spatial">
                                            <i class="fas fa-trash"></i>
                                        </a>
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
    </script>
@endpush
