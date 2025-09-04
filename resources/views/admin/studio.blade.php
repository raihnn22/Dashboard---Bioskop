@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6 text-gray-700">Daftar Studio</h2>

    {{-- Tombol Tambah --}}
    <div class="flex justify-start mb-4">
        <a href="{{ route('studios.create') }}"
            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded shadow">
            + Tambah Studio
        </a>
    </div>

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-100 text-gray-700 text-left">
                    <th class="p-3 border text-center w-16">ID</th>
                    <th class="p-3 border">Cinema</th>
                    <th class="p-3 border">Nama Studio</th>
                    <th class="p-3 border text-right">Weekday</th>
                    <th class="p-3 border text-right">Friday</th>
                    <th class="p-3 border text-right">Weekend</th>
                    <th class="p-3 border text-center w-48">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($studios as $studio)
                <tr class="hover:bg-gray-50">
                    <td class="p-3 border text-center">{{ $studio->id }}</td>
                    <td class="p-3 border">{{ $studio->cinema->name }}</td>
                    <td class="p-3 border">{{ $studio->name }}</td>

                    {{-- Harga Weekday --}}
                    <td class="p-3 border text-right">
                        Rp {{ number_format($studio->weekday_price, 0, ',', '.') }}
                    </td>

                    {{-- Harga Friday --}}
                    <td class="p-3 border text-right">
                        Rp {{ number_format($studio->friday_price, 0, ',', '.') }}
                    </td>

                    {{-- Harga Weekend --}}
                    <td class="p-3 border text-right">
                        Rp {{ number_format($studio->weekend_price, 0, ',', '.') }}
                    </td>

                    {{-- Aksi --}}
                    <td class="p-3 border text-center space-x-2">
                        <a href="{{ route('studios.edit', $studio->id) }}"
                            class="inline-block px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded">
                            Edit
                        </a>
                        <form action="{{ route('studios.destroy', $studio->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded"
                                onclick="return confirm('Yakin hapus?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="p-4 text-center text-gray-500">Belum ada studio</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection