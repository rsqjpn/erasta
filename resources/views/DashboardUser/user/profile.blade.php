@extends('DashboardUser.main')

@section('title', 'Piagam')

@section('content')

    <div class="p-4 sm:ml-64  min-h-screen">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden p-6">

            <!-- Bagian Atas (Foto & Nama) -->
            <div class="flex flex-col md:flex-row items-center">
                <!-- Foto Profil -->
                <img class="w-40 h-40 rounded-lg object-cover border-4 border-gray-300"
                    src="{{ $user->profile ? asset('storage/' . $user->profile) : 'https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg' }}"
                    alt="Profile Picture">

                <!-- Nama & Profesi -->
                <div class="md:ml-6 text-center md:text-left mt-4 md:mt-0">
                    <h1 class="text-2xl font-bold text-gray-800">{{ $user->username }}</h1>
                    <p class="text-gray-600 text-sm uppercase tracking-wide">Atlet Taekwondo</p>
                </div>
            </div>


            <!-- Info Profil -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <!-- Profil Singkat -->
                <div>
                    <h2 class="text-lg font-semibold text-gray-800 border-b pb-1 uppercase">motivasi</h2>
                    <p class="text-sm text-gray-600 mt-2">
                        Saya seorang atlet taekwondo yang aktif berkompetisi dan terus berkembang untuk mencapai prestasi
                        terbaik.
                    </p>
                </div>

                <!-- Pendidikan -->
                <div>
                    <h2 class="text-lg font-bold text-gray-800 border-b pb-1 uppercase">Tingkat Sabuk</h2>
                    <p class="text-sm text-gray-600 mt-2">

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

            <!-- Pengalaman -->
            <div class="mt-6 overflow-y-auto max-h-60 p-5">
                <h2 class="text-lg font-semibold text-gray-800 border-b pb-1">HISTORY</h2>

                <div class="bg-white shadow-md rounded-lg p-6">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4">Medali yang Diperoleh</h2>

                    @if ($user->achievements->isNotEmpty())
                        <ol class="relative border-s border-gray-200 dark:border-gray-700 bg-slate-50">
                            @foreach ($user->achievements as $achievement)
                                <li class="mb-10 ms-6">
                                    <!-- Icon -->
                                    <span
                                        class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                        <svg class="w-2.5 h-2.5 text-blue-800 dark:text-blue-300" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Z" />
                                        </svg>
                                    </span>

                                    <!-- Nama Event & Medali -->
                                    <h3 class="flex items-center mb-1 text-lg font-semibold text-gray-900 dark:text-white">
                                        {{ $achievement->deskripsi }}
                                        <span
                                            class="text-sm font-medium me-2 px-2.5 py-0.5 rounded-sm ms-3
                        {{ $achievement->medal->type == 'gold' ? 'bg-yellow-400 text-white' : '' }}
                        {{ $achievement->medal->type == 'silver' ? 'bg-gray-400 text-white' : '' }}
                        {{ $achievement->medal->type == 'bronze' ? 'bg-orange-900 text-white' : '' }}">
                                            {{ ucfirst($achievement->medal->type) }}
                                        </span>
                                    </h3>

                                    <!-- Tanggal -->
                                    <time class="block mb-2 text-sm text-gray-400 dark:text-gray-500">
                                        {{ \Carbon\Carbon::parse($achievement->achieved_at)->format('d M Y') }}
                                    </time>

                                    <!-- Deskripsi -->
                                    <p class="mb-4 text-base text-gray-500 dark:text-gray-400">
                                        {{ $achievement->deskripsi ?? 'Tidak ada deskripsi.' }}
                                    </p>

                                    <!-- Tombol Download Sertifikat -->
                                    <a href=""
                                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-lg hover:bg-gray-100 hover:text-blue-700">
                                        <svg class="w-3.5 h-3.5 me-2.5" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M14.707 7.793a1 1 0 0 0-1.414 0L11 10.086V1.5a1 1 0 0 0-2 0v8.586L6.707 7.793a1 1 0 1 0-1.414 1.414l4 4a1 1 0 0 0 1.416 0l4-4a1 1 0 0 0-.002-1.414Z" />
                                            <path
                                                d="M18 12h-2.55l-2.975 2.975a3.5 3.5 0 0 1-4.95 0L4.55 12H2a2 2 0 0 0-2 2v4a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2v-4a2 2 0 0 0-2-2Zm-3 5a1 1 0 1 1 0-2 1 1 0 0 1 0 2Z" />
                                        </svg>
                                        Download Certificate
                                    </a>
                                </li>
                            @endforeach
                        </ol>
                    @else
                        <p class="text-gray-500">Belum memiliki medali.</p>
                    @endif

                </div>



            </div>



            <!-- Tombol Edit -->
            <div class="mt-6 text-right">
                <a href="{{ route('user.edit') }}"
                    class="bg-sky-500 text-white px-4 py-2 rounded-md text-sm font-semibold hover:bg-sky-800">
                    Edit Profile <i class="fa-solid fa-pen-to-square"></i>
                </a>
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
