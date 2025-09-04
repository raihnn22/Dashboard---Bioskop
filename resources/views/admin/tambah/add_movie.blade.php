@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold mb-4">Tambah Film Baru</h2>

    <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Judul --}}
        <div class="mb-4">
            <label class="block font-semibold">Judul Film</label>
            <input type="text" name="title" value="{{ old('title') }}"
                class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
            @error('title') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Durasi --}}
        <div class="mb-4">
            <label class="block font-semibold">Durasi (menit)</label>
            <input type="number" name="duration" value="{{ old('duration') }}"
                class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
            @error('duration') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Rating Usia --}}
        <div class="mb-4">
            <label class="block font-semibold">Rating Usia</label>
            <input type="text" name="age" value="{{ old('age') }}"
                class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
            @error('age') <p class="text-red-500 text-sm">{{ $message }}</p> @enderror
        </div>

        {{-- Jenis Animasi --}}
        <div class="mb-4">
            <label class="block font-semibold">Jenis Animasi</label>
            <input type="text" name="animation_type" value="{{ old('animation_type') }}"
                class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
        </div>

        {{-- Trailer --}}
        <div class="mb-4">
            <label class="block font-semibold">Trailer (URL YouTube)</label>
            <input type="text" name="trailer" value="{{ old('trailer') }}"
                class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
        </div>

        {{-- Tanggal Tayang --}}
        <div class="mb-4">
            <label class="block font-semibold">Tanggal Tayang</label>
            <input type="date" name="start_showing" value="{{ old('start_showing') }}"
                class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
        </div>

        {{-- Tanggal Penjualan --}}
        <div class="mb-4">
            <label class="block font-semibold">Tanggal Mulai Penjualan</label>
            <input type="date" name="start_selling" value="{{ old('start_selling') }}"
                class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
        </div>

        {{-- Sinopsis --}}
        <div class="mb-4">
            <label class="block font-semibold">Sinopsis</label>
            <textarea name="synopsis" rows="4"
                class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">{{ old('synopsis') }}</textarea>
        </div>

        {{-- Produser --}}
        <div class="mb-4">
            <label class="block font-semibold">Produser</label>
            <input type="text" name="producer" value="{{ old('producer') }}"
                class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
        </div>

        {{-- Sutradara --}}
        <div class="mb-4">
            <label class="block font-semibold">Sutradara</label>
            <input type="text" name="director" value="{{ old('director') }}"
                class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
        </div>

        {{-- Penulis --}}
        <div class="mb-4">
            <label class="block font-semibold">Penulis</label>
            <input type="text" name="writer" value="{{ old('writer') }}"
                class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
        </div>

        {{-- Produksi --}}
        <div class="mb-4">
            <label class="block font-semibold">Produksi</label>
            <input type="text" name="production" value="{{ old('production') }}"
                class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
        </div>

        {{-- Aktor --}}
        <div class="mb-4">
            <label class="block font-semibold">Aktor</label>
            <div id="actors-container">
                <div class="actor-row mb-2 flex items-center gap-2">
                    <input type="text" name="actors[]" placeholder="Nama Aktor"
                        class="border p-2 rounded-lg w-1/2 focus:ring focus:ring-blue-300">
                    <input type="file" name="actor_photos[]" class="border p-2 rounded-lg w-1/2">
                    <button type="button" class="remove-actor px-2 py-1 bg-red-500 text-white rounded-lg">Hapus</button>
                </div>
            </div>
            <button type="button" id="add-actor" class="px-4 py-2 bg-green-500 text-white rounded-lg mt-2">Tambah Aktor</button>
        </div>


        {{-- Tombol --}}
        <div class="flex justify-end">
            <a href="{{ route('movies.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg mr-2">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan</button>
        </div>
    </form>
</div>

<script>
    document.getElementById('add-actor').addEventListener('click', function() {
        let container = document.getElementById('actors-container');
        let div = document.createElement('div');
        div.classList.add('actor-row', 'mb-2', 'flex', 'items-center', 'gap-2');
        div.innerHTML = `
        <input type="text" name="actors[]" placeholder="Nama Aktor"
            class="border p-2 rounded-lg w-1/2 focus:ring focus:ring-blue-300">
        <input type="file" name="actor_photos[]" class="border p-2 rounded-lg w-1/2">
        <button type="button" class="remove-actor px-2 py-1 bg-red-500 text-white rounded-lg">Hapus</button>
    `;
        container.appendChild(div);
    });

    // Hapus baris aktor
    document.addEventListener('click', function(e) {
        if (e.target && e.target.classList.contains('remove-actor')) {
            e.target.parentElement.remove();
        }
    });
</script>

@endsection