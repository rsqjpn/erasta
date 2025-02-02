@extends('DashboardAdmin.layout')

@section('title', 'Edit Medali')

@section('content')
<div class="sm:ml-64 bg-gray-100 p-6">
    <div class="container mx-auto bg-white p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-semibold mb-4">Edit Medali</h2>

        <!-- Form Edit Medali -->
        <form method="POST" action="{{ route('medals.update', $medal->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <!-- Nama Medali -->
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-900">Nama Medali</label>
                <input type="text" name="name" id="name" value="{{ $medal->name }}" required
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5">
            </div>

            <!-- Tipe Medali -->
            <div class="mb-4">
                <label for="type" class="block text-sm font-medium text-gray-900">Tipe Medali</label>
                <select name="type" id="type"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                    <option value="gold" {{ $medal->type == 'gold' ? 'selected' : '' }}>Gold</option>
                    <option value="silver" {{ $medal->type == 'silver' ? 'selected' : '' }}>Silver</option>
                    <option value="bronze" {{ $medal->type == 'bronze' ? 'selected' : '' }}>Bronze</option>
                </select>
            </div>

            <!-- Gambar Medali -->
            <div class="mb-4">
                <label for="picture" class="block text-sm font-medium text-gray-900">Gambar Medali</label>
                <input type="file" name="picture" id="picture" accept="image/*"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5">
                <div class="mt-2">
                    <img id="preview-image" src="{{ asset($medal->picture ?? 'img/medals/default.png') }}"
                         alt="Medal Image" class="w-20 h-20 rounded border border-gray-300">
                </div>
            </div>

            <!-- Tombol -->
            <div class="flex justify-end space-x-2">
                <a href="{{ route('medals.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
                    Batal
                </a>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700">
                    Update
                </button>
            </div>
        </form>
    </div>
</div>

<!-- Preview Gambar Sebelum Upload -->
<script>
    document.getElementById('picture').addEventListener('change', function(event) {
        let reader = new FileReader();
        reader.onload = function() {
            document.getElementById('preview-image').src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    });
</script>

@endsection
