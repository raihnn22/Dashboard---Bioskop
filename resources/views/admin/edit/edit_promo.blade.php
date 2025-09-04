@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white shadow-md rounded-lg p-6">
    <h1 class="text-xl font-bold mb-4">Edit Promo</h1>

    <form action="{{ route('promos.update', $promo->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700">Cover</label>
            @if($promo->cover)
                <img src="{{ asset('storage/'.$promo->cover) }}" alt="cover" class="w-32 h-32 object-cover mb-2">
            @endif
            <input type="file" name="cover"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">
            @error('cover')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Nama Promo</label>
            <input type="text" name="name" value="{{ old('name', $promo->name) }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Tanggal Berakhir</label>
            <input type="date" name="berakhir" value="{{ old('berakhir', $promo->berakhir) }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">
            @error('berakhir')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Deskripsi</label>
            <textarea name="deskripsi" rows="3"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">{{ old('deskripsi', $promo->deskripsi) }}</textarea>
            @error('deskripsi')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Syarat</label>
            <textarea name="syarat" rows="3"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">{{ old('syarat', $promo->syarat) }}</textarea>
            @error('syarat')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-between">
            <a href="{{ route('promos.index') }}"
               class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
               Kembali
            </a>
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
