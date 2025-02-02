@extends('DashboardAdmin.layout')

@section('title', 'Pelatih')

@section('content')
    <div class="sm:ml-64 bg-slate-00 p-6">
        <div class="container mx-auto p-4 rounded-lg">

            <div class="relative overflow-x-auto shadow-xl sm:rounded-lg bg-white p-4">
                <div class="flex items-center justify-between pb-4">
                    <h2 class="text-xl font-semibold text-gray-800">Pelatih</h2>

                    <!-- Modal toggle -->
                    <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                        class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                        type="button">
                        Tambah Pelatih
                    </button>

                    <!-- Main modal -->
                    <div id="crud-modal" tabindex="-1" aria-hidden="true"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative p-4 w-full max-w-xl max-h-full">
                            <!-- Modal content -->
                            <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700 p-6">
                                <!-- Modal header -->
                                <div
                                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                        Tambah Pelatih Baru
                                    </h3>
                                    <button type="button"
                                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                        data-modal-toggle="crud-modal">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <!-- Modal body -->
                                <form method="POST" action="{{ route('pelatih.store') }}">
                                    @csrf
                                    <div class="grid gap-4 mb-4 grid-cols-2 h-96 overflow-y-auto">
                                        <div class="col-span-2">
                                            <label for="user_id"
                                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                                Pilih User
                                            </label>
                                            <select name="user_id" id="user_id"
                                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                                <option selected disabled>Pilih User</option>
                                                @foreach ($users as $u)
                                                    <option value="{{ $u->id }}">{{ $u->username }} -
                                                        {{ $u->email }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <button type="submit"
                                        class="text-white inline-flex items-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                        <svg class="me-1 -ms-1 w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        Simpan
                                    </button>
                                </form>



                            </div>
                        </div>
                    </div>
                </div>

                <!-- Search Input -->
                <form method="GET" action="{{ route('anggota') }}">
                    <div class="relative">
                        <input type="text" name="search" id="table-search" value="{{ request()->input('search') }}"
                            class="block ms-auto w-80 px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Cari User...">
                        <button type="submit" class="absolute right-2 top-2 text-gray-500">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </button>
                    </div>
                </form>

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 mt-4">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nama</th>
                            <th scope="col" class="px-6 py-3">Code</th>
                            <th scope="col" class="px-6 py-3">Usia</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelatih as $p)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $p->nama }}
                                </td>
                                <td class="px-6 py-4">{{ $p->code }}</td>
                               <td class="px-6 py-4">{{ \Carbon\Carbon::parse($p->tgl_lahir)->age }} Tahun</td>

                                <td class="px-6 py-4">
                                    <img src="{{ asset($p->profile ? $p->profile : 'img/profile/default.png') }}"
                                        alt="Profile Image" class="w-12 h-12 rounded-full">
                                </td>
                                <td class="px-6 py-4">
                                    <button type="button" onclick="confirmDelete({{ $p->id }})"
                                        class="font-medium text-red-600 dark:text-red-500 hover:underline">
                                        <i class="fa-solid fa-trash"></i>
                                    </button>
                                    <form id="delete-form-{{ $p->id }}"
                                        action="{{ route('pelatih.destroy', $p->id) }}" method="POST"
                                        style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        // Live search without reloading
        document.getElementById("table-search").addEventListener("keyup", function() {
            let searchValue = this.value.toLowerCase();
            let tableRows = document.querySelectorAll("tbody tr");

            tableRows.forEach(row => {
                let userName = row.querySelector("td:nth-child(1)").textContent.toLowerCase();
                let userEmail = row.querySelector("td:nth-child(2)").textContent.toLowerCase();

                if (userName.includes(searchValue) || userEmail.includes(searchValue)) {
                    row.style.display = "";
                } else {
                    row.style.display = "none";
                }
            });
        });

        // SweetAlert for Delete Confirmation
        function confirmDelete(userId) {
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + userId).submit();
                }
            });
        }

        // Success Alert after Action
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
@endsection
