@extends('DashboardUser.main')

@section('title', 'Piagam')

@section('content')

    <div class="p-4 font-inter  min-h-screen">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden p-6">

            <!-- Bagian Atas (Foto & Nama) -->
            <div class="flex flex-col md:flex-row items-center">
                <!-- Foto Profil -->
                <img class="w-40 h-40 rounded-full object-cover border border-gray-300"
                    src="{{ $user->profile ? asset('img/profile/' . $user->profile) : 'https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg' }}"
                    alt="Profile Picture">

                <!-- Nama & Profesi -->
                <div class="md:ml-6 text-center md:text-left mt-4 md:mt-0">
                    <h1 class="text-2xl font-bold text-gray-800">{{ $user->username }}</h1>
                    <p class="text-gray-600 text-xs tracking-wide">Atlet Taekwondo</p>
                </div>
            </div>


            <!-- Info Profil -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <!-- Profil Singkat -->
                <div>
                    <h2 class="text-md font-semibold text-gray-800 border-b pb-1 uppercase">motivasi</h2>
                    <p class="text-xs text-gray-600 mt-2">
                        Saya seorang atlet taekwondo yang aktif berkompetisi dan terus berkembang untuk mencapai prestasi
                        terbaik.
                    </p>
                </div>

                <!-- Pendidikan -->
                <div>
                    <h2 class="text-md font-bold text-gray-800 border-b pb-1 uppercase">Tingkat Sabuk</h2>
                    <p class="text-sm text-gray-600 mt-2">
                        {{ $user->tingkat }}
                    </p>
                </div>
            </div>

            <!-- Kontak -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
                <div class="flex items-center">
                    <i class="fa-solid fa-phone text-gray-700 mr-2"></i>
                    <p class="text-sm text-gray-600">123-456-7890</p>
                </div>
                <div class="flex items-center">
                    <i class="fa-solid fa-envelope text-gray-700 mr-2"></i>
                    <p class="text-sm text-gray-600">{{ $user->email }}</p>
                </div>
                <div class="flex items-center">
                    <i class="fa-solid fa-location-dot text-gray-700 mr-2"></i>
                    <p class="text-sm text-gray-600">{{ $user->alamat ?? 'Tidak Tersedia' }}</p>
                </div>
            </div>

            <div class="md:flex justify-end gap-4 mt-5 border-t-2">
                <!-- Tombol Edit -->
                <div class="mt-6 text-right">
                    <a href="{{ route('user.edit') }}"
                        class="bg-red-500 text-white px-4 py-2 rounded-md text-xs font-semibold hover:bg-red-800">
                        Complete MyData<i class="fa-regular fa-file ml-2"></i>
                    </a>
                </div>
                <!-- Tombol Edit -->
                <div class="mt-6 text-right">
                    <a href="{{ route('user.edit') }}"
                        class="bg-sky-500 text-white px-4 py-2 rounded-md text-xs font-semibold hover:bg-sky-800">
                        Edit Profile <i class="fa-solid fa-pen-to-square"></i>
                    </a>
                </div>

            </div>




        </div>
    </div>
    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Sukses!',
                text: "{{ session('success') }}",
                confirmButtonColor: '#3085d6'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ session('error') }}",
                confirmButtonColor: '#d33'
            });
        </script>
    @endif

@endsection
