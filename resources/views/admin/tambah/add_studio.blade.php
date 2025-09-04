@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-8 bg-white rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-700">Tambah Studio</h1>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('studios.store') }}" method="POST" class="space-y-4">
        @csrf

        {{-- Nama Studio --}}
        <div>
            <label for="name" class="block font-medium mb-2">Nama Studio</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" 
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200" 
                   required>
        </div>

        {{-- Pilih Cinema --}}
        <div>
            <label for="cinema_id" class="block font-medium mb-2">Pilih Kota</label>
            <select name="cinema_id" id="cinema_id" 
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200" 
                    required>
                <option value="">-- Pilih Kota --</option>
                @foreach($cinemas as $cinema)
                    <option value="{{ $cinema->id }}" {{ old('cinema_id') == $cinema->id ? 'selected' : '' }}>
                        {{ $cinema->name }} ({{ $cinema->city->name }})
                    </option>
                @endforeach
            </select>
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('studios.index') }}" 
               class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Kembali
            </a>
            <button type="submit" 
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Simpan
            </button>
        </div>
    </form>
</div>
@endsection
