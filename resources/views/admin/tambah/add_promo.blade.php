@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold mb-4">Tambah Promo Baru</h2>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('promos.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Cover --}}
        <div class="mb-4">
            <label class="block font-semibold">Cover (Pilih Gambar)</label>
            <input type="file" name="cover" accept="image/*"
                   class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
        </div>

        {{-- Nama Promo --}}
        <div class="mb-4">
            <label class="block font-semibold">Nama Promo</label>
            <input type="text" name="name" value="{{ old('name') }}"
                   class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300" required>
        </div>

        {{-- Tanggal Berakhir --}}
        <div class="mb-4">
            <label class="block font-semibold">Tanggal Berakhir</label>
            <input type="date" name="berakhir" value="{{ old('berakhir') }}"
                   class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300" required>
        </div>

        {{-- Deskripsi --}}
        <div class="mb-4">
            <label class="block font-semibold">Deskripsi</label>
            <textarea name="deskripsi" rows="3"
                      class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300" required>{{ old('deskripsi') }}</textarea>
        </div>

        {{-- Syarat --}}
        <div class="mb-4">
            <label class="block font-semibold">Syarat</label>
            <textarea name="syarat" rows="3"
                      class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300" required>{{ old('syarat') }}</textarea>
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end">
            <a href="{{ route('promos.index') }}"
               class="px-4 py-2 bg-gray-500 text-white rounded-lg mr-2">Batal</a>
            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan</button>
        </div>
    </form>
</div>
@endsection
