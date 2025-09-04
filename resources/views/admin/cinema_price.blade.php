
@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6 text-gray-700">Daftar Harga Tiket</h2>

    <div class="flex justify-start mb-4">
        <a href="{{ route('prices.create') }}" 
           class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded shadow">
            + Tambah Harga
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-100 text-gray-700 text-left">
                    <th class="p-3 border">Studio</th>
                    <th class="p-3 border">Cinema</th>
                    <th class="p-3 border">Kota</th>
                    <th class="p-3 border">Weekday</th>
                    <th class="p-3 border">Friday</th>
                    <th class="p-3 border">Weekend</th>
                    <th class="p-3 border text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($prices as $price)
                <tr class="hover:bg-gray-50">
                    <td class="p-3 border">{{ $price->studio->name }}</td>
                    <td class="p-3 border">{{ $price->studio->cinema->name }}</td>
                    <td class="p-3 border">{{ $price->studio->cinema->city->name }}</td>
                    <td class="p-3 border">{{ $price->weekday_price }}</td>
                    <td class="p-3 border">{{ $price->friday_price }}</td>
                    <td class="p-3 border">{{ $price->weekend_price }}</td>
                    <td class="p-3 border text-center space-x-2">
                        <a href="{{ route('prices.edit', $price->id) }}" 
                           class="inline-block px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded">
                           Edit
                        </a>
                        <form action="{{ route('prices.destroy', $price->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded" 
                                    onclick="return confirm('Yakin hapus?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="p-4 text-center text-gray-500">Belum ada harga tiket</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
