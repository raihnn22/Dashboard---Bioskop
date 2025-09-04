@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold mb-4">Tambah Cinema</h2>

    {{-- Error Message --}}
    @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cinemas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Gambar Cinema --}}
        <div class="mb-4">
            <label for="image" class="block font-semibold">Gambar Tempat</label>
            <input type="file" name="image" id="image" accept="image/*"
                   class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
            @error('image')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Nama Cinema --}}
        <div class="mb-4">
            <label for="name" class="block font-semibold">Nama Tempat</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}"
                   class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300"
                   placeholder="Masukkan nama cinema" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Kota --}}
        <div class="mb-4">
            <label for="city_id" class="block font-semibold">Pilih Kota</label>
            <select name="city_id" id="city_id"
                    class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300" required>
                <option value="">-- Pilih Kota --</option>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                        {{ $city->name }}
                    </option>
                @endforeach
            </select>
            @error('city_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Alamat --}}
        <div class="mb-4">
            <label for="address" class="block font-semibold">Alamat Cinema</label>
            <input type="text" name="address" id="address" value="{{ old('address') }}"
                   class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300"
                   placeholder="Masukkan alamat cinema" required>
            @error('address')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end">
            <a href="{{ route('cinemas.index') }}"
               class="px-4 py-2 bg-gray-500 text-white rounded-lg mr-2">Batal</a>
            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan</button>
        </div>
    </form>
</div>
@endsection
