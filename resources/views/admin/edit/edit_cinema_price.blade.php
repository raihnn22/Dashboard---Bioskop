@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto bg-white p-6 rounded-lg shadow-lg">
    <h1 class="text-xl font-bold mb-4">Edit Harga Tiket</h1>

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

    <form action="{{ route('prices.update', $price->id) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        {{-- Pilih Studio --}}
        <div>
            <label class="block mb-1 text-gray-700">Pilih Studio</label>
            <select name="studio_id" class="w-full border px-3 py-2 rounded focus:ring focus:ring-blue-200" required>
                @foreach($studios as $studio)
                    <option value="{{ $studio->id }}" {{ $studio->id == $price->studio_id ? 'selected' : '' }}>
                        {{ $studio->name }} - {{ $studio->cinema->name }} ({{ $studio->cinema->city->name }})
                    </option>
                @endforeach
            </select>
        </div>

        {{-- Harga Weekday --}}
        <div>
            <label class="block mb-1 text-gray-700">Harga Weekday</label>
            <input type="number" name="weekday_price" value="{{ $price->weekday_price }}"
                class="w-full border px-3 py-2 rounded focus:ring focus:ring-blue-200" required>
        </div>

        {{-- Harga Friday --}}
        <div>
            <label class="block mb-1 text-gray-700">Harga Friday</label>
            <input type="number" name="friday_price" value="{{ $price->friday_price }}"
                class="w-full border px-3 py-2 rounded focus:ring focus:ring-blue-200" required>
        </div>

        {{-- Harga Weekend --}}
        <div>
            <label class="block mb-1 text-gray-700">Harga Weekend</label>
            <input type="number" name="weekend_price" value="{{ $price->weekend_price }}"
                class="w-full border px-3 py-2 rounded focus:ring focus:ring-blue-200" required>
        </div>

        {{-- Tombol --}}
        <div class="flex items-center gap-3">
            <a href="{{ route('prices.index') }}"
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
