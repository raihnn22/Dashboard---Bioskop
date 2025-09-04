@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6">
    <h1 class="text-xl font-bold mb-4">Edit Kota</h1>

    <form action="{{ route('cities.update', $city->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-gray-700">Nama Kota</label>
            <input type="text" name="name" value="{{ old('name', $city->name) }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:ring focus:ring-blue-300">
            @error('name')
                <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="flex justify-between">
            <a href="{{ route('cities.index') }}"
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
