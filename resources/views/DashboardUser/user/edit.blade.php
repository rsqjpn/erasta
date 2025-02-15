@extends('DashboardUser.main')

@section('title', 'Edit Profile')

@section('content')
<div class="p-4  min-h-screen">
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden p-6">
        <h1 class="text-2xl font-bold text-gray-800">Edit Profile</h1>

        <!-- Form Edit Profile -->
        <form action="{{ url('users/' . $user->id) }}"  method="POST" enctype="multipart/form-data" class="mt-6">
            @csrf
            @method('PUT')

            <!-- Foto Profil -->
            <div class="flex items-center mb-6">
                <img id="preview-image" class="w-24 h-24 rounded-lg object-cover border-4 border-gray-300"
                    src="{{ $user->profile ? asset('storage/' . $user->profile) : 'https://img.freepik.com/free-vector/businessman-character-avatar-isolated_24877-60111.jpg' }}"
                    alt="Profile Picture">
                <input type="file" name="profile" id="profile" class="ml-4 border border-gray-300 p-2 rounded-md"
                    accept="image/*" onchange="previewImage(event)">
            </div>

            <!-- Username -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Username</label>
                <input type="text" name="username" value="{{ $user->username }}" required
                    class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" required
                    class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Alamat -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Alamat</label>
                <input type="text" name="alamat" value="{{ $user->alamat ?? '' }}"
                    class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Tanggal Lahir -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="{{ $user->tanggal_lahir ?? '' }}"
                    class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Status Atlet -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Status Atlet</label>
                <select name="isAtlet" class="w-full p-2 border border-gray-300 rounded-md">
                    <option value="yes" {{ $user->isAtlet == 'yes' ? 'selected' : '' }}>Ya</option>
                    <option value="no" {{ $user->isAtlet == 'no' ? 'selected' : '' }}>Tidak</option>
                </select>
            </div>

            <!-- Tanggal Bergabung -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Tanggal Bergabung</label>
                <input type="date" name="tanggal_join" value="{{ $user->tanggal_join ?? '' }}"
                    class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Tingkat -->
            <div class="mb-4">
                <label class="block text-gray-700 font-semibold">Tingkat</label>
                <input type="text" name="tingkat" value="{{ $user->tingkat ?? '' }}"
                    class="w-full p-2 border border-gray-300 rounded-md">
            </div>

            <!-- Tombol Submit -->
            <div class="text-right">
                <button type="submit" class="bg-red-900 text-white px-4 py-2 rounded-md text-sm font-semibold hover:bg-red-800">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Preview Image -->
<script>
    function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function () {
            var output = document.getElementById('preview-image');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    }
</script>
@endsection
