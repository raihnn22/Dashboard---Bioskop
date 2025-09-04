@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-xl font-bold mb-4">Edit Cinema</h1>

    {{-- Pesan sukses --}}
    @if(session('success'))
        <div class="bg-green-100 text-green-700 p-2 rounded mb-3">
            {{ session('success') }}
        </div>
    @endif

    {{-- Error --}}
    @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('cinemas.update', $cinema->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Nama Cinema --}}
        <div>
            <label class="block mb-1 text-gray-700">Nama Cinema</label>
            <input type="text" name="name" value="{{ $cinema->name }}"
                class="w-full border px-3 py-2 rounded focus:ring focus:ring-blue-200"
                placeholder="Masukkan nama cinema" required>
        </div>

        {{-- Pilih Kota --}}
        <div>
            <label class="block mb-1 text-gray-700">Pilih Kota</label>
            <select name="city_id"
                class="w-full border px-3 py-2 rounded focus:ring focus:ring-blue-200" required>
                @foreach($cities as $city)
                    <option value="{{ $city->id }}" {{ $city->id == $cinema->city_id ? 'selected' : '' }}>
                        {{ $city->name }}
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Tombol --}}
        <div class="flex items-center gap-3">
            <a href="{{ route('cinemas.index') }}"
                class="bg-red-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition">
                Back
            </a>
            <button type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
