@extends('DashboardUser.main')

@section('title', 'Dashboard')

@section('content')

     <!-- Main Content -->
        <main class="container mx-auto px-4 py-20 font-inter">
            <section class="w-full md:max-w-2xl mx-auto bg-red-950 rounded-lg p-6">
                <div class="flex gap-1  md:gap-5 items-start">
                    <img class="md:w-40 w-24 h-24 md:h-40 rounded-full object-cover border-1"
                        src="{{ $user->profile ? asset('storage/' . $user->profile) : 'https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg' }}"
                        alt="Profile Picture">
                    <h1 class="text-center font-extrabold md:text-md mt-4 text-white">Selamat Datang,
                        {{ $user->username }}</h1>
                </div>
            </section>
            <section class="w-full md:max-w-2xl mx-auto p-6 mt-2">
                <div class="flex gap-1  md:gap-5 items-center">

                    <h1 class=" font-bold md:text-md border-b-2 w-full mt-4">Dashboard User</h1>
                </div>
            </section>
            <section class="w-full max-w-5xl mx-auto px-4 py-6">
                <!-- Grid Layout -->
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4">
                    <!-- Item Navigasi -->
                    <a href="#"
                        class="items-center bg-white border h-fit border-gray-200 rounded-lg shadow-sm transition-all hover:shadow-md hover:bg-gray-100">
                        <div class="p-4 flex  items-center gap-3">
                            <i class="fa-solid fa-home bg-slate-400 rounded-md text-white text-2xl p-3"></i>
                            <div>
                                <h5 class=" text-md font-semibold text-slate-700">Home</h5>
                                <p class=" text-xs text-slate-400">Dashboard User</p>
                            </div>
                        </div>
                    </a>

                    <!-- Item Navigasi -->
                    <a href="#"
                        class="items-center bg-white border h-fit border-gray-200 rounded-lg shadow-sm transition-all hover:shadow-md hover:bg-gray-100">
                        <div class="p-4 flex  items-center gap-3">
                            <i class="fa-regular fa-calendar-days bg-orange-400 rounded-md text-white text-2xl p-3"></i>
                            <div>
                                <h5 class=" text-md font-semibold text-slate-700">Jadwal</h5>
                                <p class=" text-xs text-slate-400">Atur Jadwal Latihanmu</p>
                            </div>
                        </div>
                    </a>

                    <!-- Item Navigasi -->
                    <a href="#"
                        class="items-center bg-white border h-fit border-gray-200 rounded-lg shadow-sm transition-all hover:shadow-md hover:bg-gray-100">
                        <div class="p-4 flex  items-center gap-3">
                            <i class="fa-regular fa-user bg-sky-400 rounded-md text-white text-2xl p-3"></i>
                            <div>
                                <h5 class=" text-md font-semibold text-slate-700">Profile</h5>
                                <p class=" text-xs text-slate-400">Identitas Anggota</p>
                            </div>
                        </div>
                    </a>

                    <!-- Item Navigasi -->
                    <a href="#"
                        class="items-center bg-white border h-fit border-gray-200 rounded-lg shadow-sm transition-all hover:shadow-md hover:bg-gray-100">
                        <div class="p-4 flex  items-center gap-3">
                            <i class="fa-solid fa-medal bg-teal-400 rounded-md text-white text-2xl p-3"></i>
                            <div>
                                <h5 class=" text-md font-semibold text-slate-700">Piagam</h5>
                                <p class=" text-xs text-slate-400">Penghargaan dan Medali</p>
                            </div>
                        </div>
                    </a>
                    </div>
            </section>
        </main>
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
