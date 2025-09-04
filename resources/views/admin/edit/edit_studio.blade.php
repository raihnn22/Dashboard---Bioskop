@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-8 bg-white rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-700">Edit Studio</h1>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('studios.update', $studio->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Pilih Cinema --}}
        <div>
            <label for="cinema_id" class="block font-medium mb-2">Pilih Cinema</label>
            <select name="cinema_id" id="cinema_id"
                    class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200" 
                    required>
                @foreach($cinemas as $cinema)
                    <option value="{{ $cinema->id }}" {{ $cinema->id == $studio->cinema_id ? 'selected' : '' }}>
                        {{ $cinema->name }} ({{ $cinema->city->name }})
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Nama Studio --}}
        <div>
            <label for="name" class="block font-medium mb-2">Nama Studio</label>
            <input type="text" name="name" id="name" value="{{ $studio->name }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200"
                   required>
        </div>

        {{-- Harga Weekday --}}
        <div>
            <label for="weekday_price" class="block font-medium mb-2">Harga Weekday</label>
            <input type="number" name="weekday_price" id="weekday_price" value="{{ $studio->weekday_price }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200"
                   placeholder="Masukkan harga weekday" required>
        </div>

        {{-- Harga Friday --}}
        <div>
            <label for="friday_price" class="block font-medium mb-2">Harga Friday</label>
            <input type="number" name="friday_price" id="friday_price" value="{{ $studio->friday_price }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200"
                   placeholder="Masukkan harga hari Jumat" required>
        </div>

        {{-- Harga Weekend --}}
        <div>
            <label for="weekend_price" class="block font-medium mb-2">Harga Weekend</label>
            <input type="number" name="weekend_price" id="weekend_price" value="{{ $studio->weekend_price }}"
                   class="w-full border border-gray-300 rounded px-3 py-2 focus:ring focus:ring-blue-200"
                   placeholder="Masukkan harga weekend" required>
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('studios.index') }}" 
               class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Kembali
            </a>
            <button type="submit" 
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Update
            </button>
        </div>
    </form>
</div>
@endsection
