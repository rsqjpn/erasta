@extends('DashboardAdmin.layout')

@section('title', 'Edit Lokasi')

@section('content')
    <div class="sm:ml-64 p-6">
        <div class="container mx-auto bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold text-gray-800 mb-4">Edit Lokasi</h2>

            <form method="POST" action="{{ route('location.update', $location->id) }}">
                @csrf
                @method('PUT')

                <!-- Menampilkan error umum -->
                @if ($errors->has('general'))
                    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded relative mb-4" role="alert">
                        {{ $errors->first('general') }}
                    </div>
                @endif

                <div class="grid gap-4 mb-4 grid-cols-2">
                    <!-- Nama Lokasi -->
                    <div class="col-span-2">
                        <label for="nama" class="block text-sm font-medium text-gray-900">Nama Lokasi</label>
                        <input type="text" name="nama" id="nama" value="{{ old('nama', $location->nama) }}"
                            required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('nama')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Alamat -->
                    <div class="col-span-2">
                        <label for="alamat" class="block text-sm font-medium text-gray-900">Alamat</label>
                        <input type="text" name="alamat" id="alamat" value="{{ old('alamat', $location->alamat) }}"
                            required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('alamat')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Peta -->
                    <div class="col-span-2">
                        <label for="peta" class="block text-sm font-medium text-gray-900">Peta (Embed URL)</label>
                        <input type="text" name="peta" id="peta" value="{{ old('peta', $location->peta) }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        <p class="text-xs text-gray-500 mt-1">Salin link dari Google Maps.</p>
                        @error('peta')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                    <!-- Jam Buka -->
                    <div class="col-span-1">
                        <label for="jam_buka" class="block text-sm font-medium text-gray-900">Jam Buka</label>
                        <input type="time" name="jam_buka" id="jam_buka"
                            value="{{ old('jam_buka', $location->jam_buka) }}" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('jam_buka')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Jam Tutup -->
                    <div class="col-span-1">
                        <label for="jam_tutup" class="block text-sm font-medium text-gray-900">Jam Tutup</label>
                        <input type="time" name="jam_tutup" id="jam_tutup"
                            value="{{ old('jam_tutup', $location->jam_tutup) }}" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                        @error('jam_tutup')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>


                    <!-- Deskripsi -->
                    <div class="col-span-2">
                        <label for="deskripsi" class="block text-sm font-medium text-gray-900">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500">{{ old('deskripsi', $location->deskripsi) }}</textarea>
                        @error('deskripsi')
                            <span class="text-red-500 text-xs">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-end space-x-2">
                    <a href="{{ route('location.index') }}"
                        class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                        Batal
                    </a>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                        Simpan Perubahan
                    </button>
                </div>
            </form>

        </div>

        <script>
document.addEventListener("DOMContentLoaded", function () {
    let jamBuka = document.getElementById("jam_buka");
    let jamTutup = document.getElementById("jam_tutup");

    if (!jamBuka.value) {
        jamBuka.value = "{{ $location->jam_buka }}";
    }
    if (!jamTutup.value) {
        jamTutup.value = "{{ $location->jam_tutup }}";
    }
});
</script>

    @endsection
