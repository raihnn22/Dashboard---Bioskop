@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold mb-4">Edit Film</h2>

    <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Judul --}}
        <div class="mb-4">
            <label class="block font-semibold">Judul Film</label>
            <input type="text" name="title" value="{{ old('title', $movie->title) }}"
                class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
        </div>

        {{-- Durasi --}}
        <div class="mb-4">
            <label class="block font-semibold">Durasi (menit)</label>
            <input type="number" name="duration" value="{{ old('duration', $movie->duration) }}"
                class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
        </div>

        {{-- Rating Usia --}}
        <div class="mb-4">
            <label class="block font-semibold">Rating Usia</label>
            <input type="text" name="age" value="{{ old('age', $movie->age) }}"
                class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
        </div>

        {{-- Jenis Animasi --}}
        <div class="mb-4">
            <label class="block font-semibold">Jenis Animasi</label>
            <input type="text" name="animation_type" value="{{ old('animation_type', $movie->animation_type) }}"
                class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
        </div>

        {{-- Trailer --}}
        <div class="mb-4">
            <label class="block font-semibold">Trailer (URL YouTube)</label>
            <input type="text" name="trailer" value="{{ old('trailer', $movie->trailer) }}"
                class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
        </div>

        {{-- Tanggal Tayang --}}
        <div class="mb-4">
            <label class="block font-semibold">Tanggal Tayang</label>
            <input type="date" name="start_showing" value="{{ old('start_showing', $movie->start_showing) }}"
                class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
        </div>

        {{-- Tanggal Penjualan --}}
        <div class="mb-4">
            <label class="block font-semibold">Tanggal Mulai Penjualan</label>
            <input type="date" name="start_selling" value="{{ old('start_selling', $movie->start_selling) }}"
                class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
        </div>

        {{-- Sinopsis --}}
        <div class="mb-4">
            <label class="block font-semibold">Sinopsis</label>
            <textarea name="synopsis" rows="4"
                class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">{{ old('synopsis', $movie->synopsis) }}</textarea>
        </div>

        {{-- Produser --}}
        <div class="mb-4">
            <label class="block font-semibold">Produser</label>
            <input type="text" name="producer" value="{{ old('producer', $movie->producer) }}"
                class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
        </div>

        {{-- Sutradara --}}
        <div class="mb-4">
            <label class="block font-semibold">Sutradara</label>
            <input type="text" name="director" value="{{ old('director', $movie->director) }}"
                class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
        </div>

        {{-- Penulis --}}
        <div class="mb-4">
            <label class="block font-semibold">Penulis</label>
            <input type="text" name="writer" value="{{ old('writer', $movie->writer) }}"
                class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
        </div>

        {{-- Produksi --}}
        <div class="mb-4">
            <label class="block font-semibold">Produksi</label>
            <input type="text" name="production" value="{{ old('production', $movie->production) }}"
                class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300">
        </div>

        {{-- Aktor --}}
        <div class="mb-4">
            <label class="block font-semibold">Aktor</label>
            <div id="actors-wrapper">
                @foreach($movie->actors as $index => $actor)
                    <div class="flex items-center mb-2">
                        <input type="text" name="actors[{{ $index }}][name]" value="{{ old('actors.'.$index.'.name', $actor->name) }}"
                            class="w-1/2 border p-2 rounded-lg mr-2" placeholder="Nama Aktor">
                        <input type="file" name="actors[{{ $index }}][photo]" class="w-1/2 border p-2 rounded-lg">
                        @if($actor->photo)
                            <img src="{{ asset('storage/'.$actor->photo) }}" class="w-12 h-12 ml-2 rounded-full object-cover">
                        @endif
                    </div>
                @endforeach
            </div>
            <button type="button" onclick="addActor()" class="mt-2 px-3 py-1 bg-green-600 text-white rounded-lg">+ Tambah Aktor</button>
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end">
            <a href="{{ route('movies.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg mr-2">Batal</a>
            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg">Update</button>
        </div>
    </form>
</div>

<script>
function addActor() {
    const wrapper = document.getElementById('actors-wrapper');
    const index = wrapper.children.length;
    const div = document.createElement('div');
    div.classList.add('flex','items-center','mb-2');
    div.innerHTML = `
        <input type="text" name="actors[${index}][name]" class="w-1/2 border p-2 rounded-lg mr-2" placeholder="Nama Aktor">
        <input type="file" name="actors[${index}][photo]" class="w-1/2 border p-2 rounded-lg">
    `;
    wrapper.appendChild(div);
}
</script>
@endsection
