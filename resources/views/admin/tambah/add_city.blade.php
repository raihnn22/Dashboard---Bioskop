@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold mb-4">Tambah City</h2>

    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('cities.store') }}" method="POST">
        @csrf

        {{-- Nama Kota --}}
        <div class="mb-4">
            <label class="block font-semibold">Nama Kota</label>
            <input type="text" name="name" value="{{ old('name') }}"
                   class="w-full border p-2 rounded-lg focus:ring focus:ring-blue-300"
                   placeholder="Masukkan nama kota" required>
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Tombol --}}
        <div class="flex justify-end">
            <a href="{{ route('cities.index') }}"
               class="px-4 py-2 bg-gray-500 text-white rounded-lg mr-2">Batal</a>
            <button type="submit"
                    class="px-4 py-2 bg-blue-600 text-white rounded-lg">Simpan</button>
        </div>
    </form>
</div>
@endsection
