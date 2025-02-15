@extends('DashboardAdmin.layout')

@section('title', 'Jadwal Management')

@section('content')
    <div class="sm:ml-64 p-6">
        <h1 class="text-md border-b font-bold text-slate-500">Jadwal Management</h1>
        <div class="w-full md:max-w-4xl p-3 bg-slate-100 mt-3">
            <div class=" flex justify-end">

                <button data-modal-target="static-modal" data-modal-toggle="static-modal"
                    class="block text-white text-xs bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg  px-3 py-2 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                    type="button">
                    Generate Jadwal <i class="fa-solid fa-gears ml-1"></i>
                </button>
            </div>

            {{-- Table --}}
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg mt-4">
                {{-- <div class="pb-4 bg-white">
                    <form method="GET" action="{{ route('jadwal.search') }}">
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative mt-1">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                            </div>
                            <input type="text" id="table-search" name="search" value="{{ request('search') }}"
                                class="block w-80 pl-10 text-sm border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Cari jadwal">
                        </div>
                    </form>


                </div> --}}

                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Tanggal</th>
                            <th scope="col" class="px-6 py-3">Pelatih</th>
                            <th scope="col" class="px-6 py-3">Tempat Latihan</th>
                            <th scope="col" class="px-6 py-3">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($jadwal as $index => $j)
                            <tr class="bg-white border-b hover:bg-gray-50">
                                <td class="px-6 py-4">{{ $index + 1 + ($jadwal->currentPage() - 1) * $jadwal->perPage() }}
                                </td>
                                <td class="px-6 py-4">{{ \Carbon\Carbon::parse($j->tanggal)->translatedFormat('l, d F Y') }}
                                </td>
                                <td class="px-6 py-4">
                                    @php
                                        $pelatihNama = collect(json_decode($j->id_pelatih))
                                            ->map(function ($id) use ($pelatih) {
                                                return $pelatih->firstWhere('id', $id)->nama ?? 'Tidak Ditemukan';
                                            })
                                            ->implode(', ');
                                    @endphp
                                    {{ $pelatihNama }}
                                </td>
                                <td class="px-6 py-4">{{ $j->tempatLatihan->nama ?? 'Tempat Tidak Ditemukan' }}</td>
                                <td class="px-6 py-4">
                                    <a href="{{ route('jadwal.edit', $j->id) }}" class="text-blue-600 hover:underline"><i
                                            class="fa-solid fa-pen"></i></a>
                                    <form action="{{ route('jadwal.destroy', $j->id) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="text-red-600 hover:underline ml-2 text-xs font-semibold"
                                            onclick="return confirm('Hapus jadwal ini?')"> <i
                                                class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-4 text-center">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>

                </table>
                <div class="mt-4">
                    {{ $jadwal->appends(['search' => request()->search])->links('pagination::tailwind') }}
                </div>

            </div>






        </div>
        <!-- Main modal -->
        <div id="static-modal" data-modal-backdrop="static" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow-sm dark:bg-gray-700">
                    <!-- Modal header -->
                    <div
                        class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 border-gray-200">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Static modal
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="static-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        <form action="{{ route('jadwal.generate') }}" method="POST">
                            @csrf
                            <div class="mb-4">
                                <label for="type" class="block font-medium text-slate-600">Pilih Rentang
                                    Waktu:</label>
                                <select name="type" id="type" class="border rounded w-full p-2">
                                    <option value="week">Minggu Ini</option>
                                    <option value="month">Bulan Ini</option>
                                    <option value="custom">Rentang Tanggal</option>
                                </select>
                            </div>

                            <div id="custom-dates" class="hidden">
                                <label for="start_date" class="block font-medium text-slate-600">Tanggal Mulai:</label>
                                <input type="date" name="start_date" id="start_date"
                                    class="border rounded w-full p-2 mb-4">
                                <label for="end_date" class="block font-medium text-slate-600">Tanggal Selesai:</label>
                                <input type="date" name="end_date" id="end_date" class="border rounded w-full p-2">
                            </div>

                            <div class="mb-4">
                                <label for="id_pelatih" class="block font-medium text-slate-600">Pilih Pelatih (Bisa
                                    Lebih dari Satu):</label>
                                <div class="grid grid-cols-2 gap-4">
                                    @foreach ($pelatih as $p)
                                        <div class="flex items-center">
                                            <input type="checkbox" name="id_pelatih[]" value="{{ $p->id }}"
                                                id="pelatih-{{ $p->id }}" class="mr-2">
                                            <label for="pelatih-{{ $p->id }}">{{ $p->nama }}</label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="mb-4">
                                <label for="id_tempat_latihan" class="block font-medium text-slate-600">Pilih Tempat
                                    Latihan:</label>
                                <select name="id_tempat_latihan" id="id_tempat_latihan"
                                    class="border rounded w-full p-2">
                                    @foreach ($tempat_latihan as $t)
                                        <option value="{{ $t->id }}">{{ $t->nama }}</option>
                                    @endforeach
                                </select>
                            </div>


                    </div>
                    <!-- Modal footer -->
                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                        <button data-modal-hide="static-modal" type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Generate</button>
                        <button data-modal-hide="static-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Batal</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const typeSelect = document.getElementById('type');
            const customDates = document.getElementById('custom-dates');

            typeSelect.addEventListener('change', function() {
                if (this.value === 'custom') {
                    customDates.classList.remove('hidden');
                } else {
                    customDates.classList.add('hidden');
                }
            });

            // SweetAlert untuk feedback
            @if (session('success'))
                Swal.fire({
                    icon: 'success',
                    title: 'Sukses!',
                    text: '{{ session('success') }}',
                });
            @endif

            @if (session('error'))
                Swal.fire({
                    icon: 'error',
                    title: 'Error!',
                    text: '{{ session('error') }}',
                });
            @endif
        });
    </script>
@endsection
