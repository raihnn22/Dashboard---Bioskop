@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto p-8 bg-white rounded shadow-md">
    <h1 class="text-2xl font-bold mb-6 text-gray-700">Tambah Harga Tiket</h1>

    @if ($errors->any())
        <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('prices.store') }}" method="POST" class="space-y-4">
        @csrf

        {{-- Pilih Studio --}}
        <div>
            <label for="studio_id" class="block font-medium mb-2">Pilih Studio</label>
            <select name="studio_id" id="studio_id" class="w-full border border-gray-300 rounded px-3 py-2" required>
                <option value="">-- Pilih Studio --</option>
                @foreach($studios as $studio)
                    <option value="{{ $studio->id }}">
                        {{ $studio->name }} - {{ $studio->cinema->name }} ({{ $studio->cinema->city->name }})
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Harga Weekday --}}
        <div>
            <label for="weekday_price" class="block font-medium mb-2">Harga Weekday</label>
            <input type="number" name="weekday_price" id="weekday_price" class="w-full border border-gray-300 rounded px-3 py-2" required>
        </div>

        {{-- Harga Friday --}}
        <div>
            <label for="friday_price" class="block font-medium mb-2">Harga Friday</label>
            <input type="number" name="friday_price" id="friday_price" class="w-full border border-gray-300 rounded px-3 py-2" required>
        </div>

        {{-- Harga Weekend --}}
        <div>
            <label for="weekend_price" class="block font-medium mb-2">Harga Weekend</label>
            <input type="number" name="weekend_price" id="weekend_price" class="w-full border border-gray-300 rounded px-3 py-2" required>
        </div>

        <div class="flex justify-between items-center">
            <a href="{{ route('prices.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>
@endsection
