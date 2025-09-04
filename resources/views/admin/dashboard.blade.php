@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6">
    {{-- Judul --}}
    <h1 class="text-2xl font-bold mb-6 text-gray-700">Dashboard</h1>

    {{-- Statistik Ringkas --}}
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h2 class="text-lg font-semibold text-gray-700">Total Cinema</h2>
            <p class="text-3xl font-bold text-blue-600 mt-2">{{ $cinemaCount ?? 0 }}</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h2 class="text-lg font-semibold text-gray-700">Total Studio</h2>
            <p class="text-3xl font-bold text-green-600 mt-2">{{ $studioCount ?? 0 }}</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <h2 class="text-lg font-semibold text-gray-700">Total Promo</h2>
            <p class="text-3xl font-bold text-red-600 mt-2">{{ $promoCount ?? 0 }}</p>
        </div>
    </div>

    {{-- Menu Cepat --}}
    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-lg font-semibold text-gray-700 mb-4">Menu Cepat</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
            <a href="{{ route('cinemas.index') }}" class="block bg-blue-600 text-white text-center p-4 rounded-lg hover:bg-blue-700 transition">
                Kelola Cinema
            </a>
            <a href="{{ route('studios.index') }}" class="block bg-green-600 text-white text-center p-4 rounded-lg hover:bg-green-700 transition">
                Kelola Studio
            </a>
            <a href="{{ route('promos.index') }}" class="block bg-red-600 text-white text-center p-4 rounded-lg hover:bg-red-700 transition">
                Kelola Promo
            </a>
        </div>
    </div>
</div>
@endsection
