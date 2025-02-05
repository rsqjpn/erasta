@extends('DashboardAdmin.layout')

@section('title', 'Edit User')

@section('content')
    <div class="sm:ml-64 bg-slate-00 p-6">
              <h2 class="text-md  font-semibold text-gray-800 mb-4"><a href="{{ route('anggota') }}">User Management </a><i class="fa-solid fa-angle-right mx-3"></i>Edit User</h2>
        <div class="container mx-auto bg-white p-6 rounded-lg shadow-md">


            <form id="editUserForm" method="POST" action="{{ route('admin.users.update', $user->id) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid gap-4 mb-4 grid-cols-2">

                    <!-- Profil Image Preview -->
                    <div class="col-span-2 text-center">
                        <label for="profile"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profil Picture</label>
                        <input type="file" name="profile" id="profile" accept="image/*" class="hidden"
                            onchange="previewImage(event)">

                        <label for="profile" class="cursor-pointer">
                            <img id="profilePreview"
                                src="{{ $user->profile ? asset('storage/' . $user->profile) : asset('img/profile/default.png') }}"
                                alt="Profile Image" class=" w-40 h-40 rounded-md mx-auto   border-gray-300">

                        </label>

                        <p class="text-xs text-slate-500 mt-2">Klik gambar untuk mengubah</p>
                    </div>

                    <!-- Nama -->
                    <div class="col-span-2">
                        <label for="username"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                        <input type="text" name="username" id="username" value="{{ $user->username }}" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    </div>

                    <!-- Email -->
                    <div class="col-span-2">
                        <label for="email"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                        <input type="email" name="email" id="email" value="{{ $user->email }}" required
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    </div>

                    <!-- Tanggal Lahir -->
                    <div class="col-span-2 sm:col-span-1">
                        <label for="tanggal_lahir"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                            value="{{ $user->tanggal_lahir ? \Carbon\Carbon::parse($user->tanggal_lahir)->format('Y-m-d') : '' }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    </div>

                    <!-- Tanggal Join -->
                    <div class="col-span-2 sm:col-span-1">
                        <label for="tanggal_join"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Join</label>
                        <input type="date" name="tanggal_join" id="tanggal_join"
                            value="{{ $user->tanggal_join ? \Carbon\Carbon::parse($user->tanggal_join)->format('Y-m-d') : '' }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    </div>


                    <!-- No Telp -->
                    <div class="col-span-2 sm:col-span-1">
                        <label for="no_telp" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">No
                            HP</label>
                        <input type="text" name="no_telp" id="no_telp" value="{{ $user->no_telp }}"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                    </div>

                    <!-- Role -->
                    <div class="col-span-2 sm:col-span-1">
                        <label for="role"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                        <select name="role" id="role"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                            <option value="anggota" {{ $user->role == 'anggota' ? 'selected' : '' }}>Anggota</option>
                            <option value="pelatih" {{ $user->role == 'pelatih' ? 'selected' : '' }}>Pelatih</option>
                            <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                        </select>
                    </div>

                    <!-- Kategori Atlet -->
                    <div class="col-span-2 sm:col-span-1">
                        <label for="isAtlet"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Kategori</label>
                        <select name="isAtlet" id="isAtlet"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">
                            <option value="yes" {{ $user->isAtlet == 'yes' ? 'selected' : '' }}>Atlet</option>
                            <option value="no" {{ $user->isAtlet == 'no' ? 'selected' : '' }}>Non Atlet</option>
                        </select>
                    </div>

                    <!-- Alamat -->
                    <div class="col-span-2">
                        <label for="alamat"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg block w-full p-2.5">{{ $user->alamat }}</textarea>
                    </div>
                </div>

                <!-- Button -->
                <div class="flex justify-end mt-4 space-x-3">
                    <a href="{{ route('anggota') }}"
                        class="px-5 py-2 text-sm text-gray-700 border border-gray-300 rounded-lg bg-gray-100 hover:bg-gray-200">
                        Batal
                    </a>
                    <button type="button" onclick="confirmUpdate()"
                        class="px-5 py-2 text-sm text-white bg-blue-700 hover:bg-blue-800 rounded-lg">
                        Simpan Perubahan
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmUpdate() {
            Swal.fire({
                title: "Konfirmasi Edit",
                text: "Apakah Anda yakin ingin menyimpan perubahan ini?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Ya, Simpan"
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('editUserForm').submit();
                }
            });
        }

        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function() {
                var output = document.getElementById('profilePreview');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
