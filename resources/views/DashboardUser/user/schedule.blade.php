@extends('DashboardUser.main')

@section('title', 'Pengatur Jadwal - Taekwondo')

@section('content')
<div class="p-4 font-inter min-h-screen bg-gray-50">
    <div class="bg-white rounded-lg shadow-md p-6">
        <h2 class="text-xl font-semibold text-gray-800 mb-4">Pengaturan Jadwal Siswa</h2>

        <!-- Form Jadwal -->
        <form action="" method="POST" class="space-y-6">
            @csrf
            <!-- Informasi Siswa -->
            <div>
                <label for="student-name" class="block text-sm font-medium text-gray-700">Nama Siswa</label>
                <input
                    type="text"
                    id="student-name"
                    name="student_name"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                    placeholder="Nama Lengkap Siswa"
                    required>
            </div>

            <!-- Pilihan Hari -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Pilih Hari Latihan</label>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                    @php
                        $days = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
                    @endphp

                    @foreach ($days as $day)
                    <div class="flex items-center">
                        <input
                            type="checkbox"
                            id="day-{{ $day }}"
                            name="schedule_days[]"
                            value="{{ $day }}"
                            class="form-checkbox text-blue-600 rounded focus:ring-blue-500">
                        <label for="day-{{ $day }}" class="ml-2 text-sm text-gray-700">{{ $day }}</label>
                    </div>
                    @endforeach
                </div>
            </div>

            <!-- Waktu Pilihan -->
            <div>
                <label class="block text-sm font-medium text-gray-700">Waktu Latihan</label>
                <input
                    type="time"
                    id="schedule-time"
                    name="schedule_time"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm"
                    required>
            </div>

            <!-- Tombol Simpan -->
            <div class="text-right">
                <button
                    type="submit"
                    class="px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg hover:bg-blue-700 transition">
                    Simpan Jadwal
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
