@extends('DashboardAdmin.layout')

@section('title', 'Daftar Medali')

@section('content')
    <div class="sm:ml-64 p-6">
        <div class="container mx-auto bg-white p-6 rounded-lg shadow-md">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-semibold">Daftar Medali</h2>
                <button data-modal-target="medal-modal" data-modal-toggle="medal-modal"
                    class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 text-sm">
                    Tambah Medali
                </button>
            </div>

            <!-- Modal Tambah Medali -->
            <div id="medal-modal" tabindex="-1" aria-hidden="true"
                class="hidden fixed inset-0 z-50 justify-center items-center w-full h-screen">
                <div class="relative p-4 w-full max-w-lg bg-white rounded-lg shadow-md">
                    <div class="flex items-center justify-between pb-4 border-b">
                        <h3 class="text-lg font-semibold text-gray-900">Tambah Medali Baru</h3>
                        <button type="button"
                            class="text-gray-400 hover:text-gray-900 rounded-lg w-8 h-8 flex items-center justify-center"
                            data-modal-toggle="medal-modal">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>

                    <!-- Form Tambah Medali -->
                    <form method="POST" action="{{ route('medals.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-4">
                            <label for="name" class="block text-sm font-medium text-gray-900">Nama Medali</label>
                            <input type="text" name="name" id="name" required
                                class="border border-gray-300 text-sm rounded-lg w-full p-2.5">
                        </div>

                        <div class="mb-4">
                            <label for="type" class="block text-sm font-medium text-gray-900">Tipe Medali</label>
                            <select name="type" id="type"
                                class="border border-gray-300 text-sm rounded-lg w-full p-2.5">
                                <option value="gold">Gold</option>
                                <option value="silver">Silver</option>
                                <option value="bronze">Bronze</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="picture" class="block text-sm font-medium text-gray-900">Gambar Medali</label>
                            <input type="file" name="picture" id="picture"
                                class="border border-gray-300 text-sm rounded-lg w-full p-2.5">
                        </div>

                        <div class="flex justify-end space-x-2">
                            <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600"
                                data-modal-toggle="medal-modal">Batal</button>
                            <button type="submit"
                                class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tabel Medali -->
            <table class="w-full border-collapse border border-gray-200 mt-4 text-center">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Gambar</th>
                        <th class="border px-4 py-2">Nama</th>
                        <th class="border px-4 py-2">Tipe</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($medals as $index => $medal)
                        <tr class="border">
                            <td class="border px-4 py-2 text-sm font-bold text-gray-700">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 flex justify-center">
                                <img src="{{ asset($medal->picture ?? 'img/medals/default.png') }}" alt="Medal Image"
                                    class="w-12 h-12 rounded">
                            </td>
                            <td class="border px-4 text-sm font-bold text-gray-700 py-2">{{ $medal->name }}</td>
                            <td class="border px-4 py-2">
                                <span
                                    class="px-3 py-1 rounded-full text-xs font-semibold
                                {{ $medal->type == 'gold' ? 'bg-yellow-400 text-white' : '' }}
                                {{ $medal->type == 'silver' ? 'bg-gray-400 text-white' : '' }}
                                {{ $medal->type == 'bronze' ? 'bg-orange-900 text-white' : '' }}">
                                    {{ ucfirst($medal->type) }}
                                </span>
                            </td>
                            <td class="px-4 py-2">
                                <a href="{{ route('medals.edit', $medal->id) }}"
                                    class="text-blue-600 font-bold text-sm">Edit</a>
                                <button type="button" onclick="confirmDelete({{ $medal->id }})"
                                    class="font-bold text-red-600 hover:underline ml-3">Hapus</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Tabel Achievements -->
        <div class="container mx-auto bg-white p-6 rounded-lg shadow-md mt-10">
            <div class="flex items-center justify-between pb-4">
                <h2 class="text-xl font-semibold text-gray-800">User Achiement Medal</h2>

                <!-- Modal toggle -->
                <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-xs px-4 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Tambah User Achievement <i class="fa-solid fa-plus ml-2"></i>
                </button>

                <!-- Modal Tambah Achievement -->
                <div id="crud-modal" tabindex="-1" aria-hidden="true"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative p-4 w-full max-w-xl max-h-full">
                        <!-- Modal Content -->
                        <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700 p-6">
                            <!-- Modal Header -->
                            <div
                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
                                    Tambah Achievement Medali
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

                            <!-- Modal Body -->
                            <form method="POST" action="{{ route('achieve.store') }}">
                                @csrf
                                <div class="grid gap-4 mb-4 grid-cols-2 h-96 overflow-y-auto">
                                    <!-- Pilih User -->
                                    <div class="col-span-2">
                                        <label for="user_id"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Pilih User
                                        </label>
                                        <select name="user_id" id="user_id" required
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option selected disabled>Pilih User</option>
                                            @foreach ($users as $u)
                                                <option value="{{ $u->id }}">{{ $u->username }} -
                                                    {{ $u->email }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Pilih Medali -->
                                    <div class="col-span-2">
                                        <label for="medal_id"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Pilih Medali
                                        </label>
                                        <select name="medal_id" id="medal_id" required
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <option selected disabled>Pilih Medali</option>
                                            @foreach ($medals as $medal)
                                                <option value="{{ $medal->id }}">{{ $medal->name }} -
                                                    {{ ucfirst($medal->type) }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <!-- Deskripsi -->
                                    <div class="col-span-2">
                                        <label for="deskripsi"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            Deskripsi
                                        </label>
                                        <textarea name="deskripsi" id="deskripsi" rows="3" required
                                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Tambahkan deskripsi pencapaian..."></textarea>
                                    </div>


                                </div>

                                <div class="flex justify-end space-x-2">
                                    <button type="button"
                                        class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600"
                                        data-modal-toggle="crud-modal">Batal</button>
                                    <button type="submit"
                                        class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Search Input -->
            <form method="GET" action="{{ route('achieve.search') }}">
                <div class="relative mb-6 flex justify-end items-center">
                    <input type="text" name="search" id="table-search" value="{{ request()->input('search') }}"
                        class="block w-80 px-4 py-2 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Cari berdasarkan nama atau medali...">
                    <button type="submit" class="absolute right-2 text-gray-500">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>

            <!-- Table -->
            <table class="w-full border-collapse border border-gray-200 text-center">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border px-4 py-2">No</th>
                        <th class="border px-4 py-2">Nama User</th>
                        <th class="border px-4 py-2">Medali</th>
                        <th class="border px-4 py-2">Tanggal Diberikan</th>
                        <th class="border px-4 py-2">Deskripsi</th>
                        <th class="border px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($achievements as $index => $achievement)
                        <tr class="border">
                           <td class="border px-4 py-2 text-sm font-bold text-gray-700">
    {{ $loop->iteration }}
</td>

                            <td class="border px-4 py-2">{{ $achievement->user->username }}</td>
                            <td class="border px-4 py-2">
                                <span
                                    class="px-3 py-1 rounded-full text-xs font-semibold
                        {{ $achievement->medal->type == 'gold' ? 'bg-yellow-400 text-white' : '' }}
                        {{ $achievement->medal->type == 'silver' ? 'bg-gray-400 text-white' : '' }}
                        {{ $achievement->medal->type == 'bronze' ? 'bg-orange-900 text-white' : '' }}">
                                    {{ ucfirst($achievement->medal->type) }}
                                </span>
                            </td>
                            <td class="border px-4 py-2">{{ $achievement->created_at->format('d M Y') }}</td>
                            <td class="border px-4 py-2">{{ $achievement->deskripsi }}</td>
                            <td class="border px-4 py-2">
                                <form action="" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline">
                                        <i class="fa-solid fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="border px-4 py-2 text-center text-gray-500">
                                Tidak ada data ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            <!-- Pagination -->
            <div class="mt-4">

            </div>

        </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });

            function confirmDelete(id) {
                Swal.fire({
                    title: "Yakin ingin menghapus?",
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#d33",
                    cancelButtonColor: "#3085d6",
                    confirmButtonText: "Ya, hapus!"
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + id).submit();
                    }
                });
            }
        </script>
    @endif

@endsection
