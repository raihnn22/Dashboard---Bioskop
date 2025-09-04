{{-- resources/views/cities/index.blade.php --}}
@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white rounded-lg shadow">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-700">Daftar Kota</h2>
        <a href="{{ route('cities.create') }}"
           class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded shadow">
            + Tambah Kota
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 bg-green-100 text-green-700 p-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-100 text-gray-700 text-left">
                    <th class="p-3 border text-center">No</th>
                    <th class="p-3 border">Nama Kota</th>
                    <th class="p-3 border text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cities as $index => $city)
                <tr class="hover:bg-gray-50">
                    <td class="p-3 border text-center">{{ $index + 1 }}</td>
                    <td class="p-3 border">{{ $city->name }}</td>
                    <td class="p-3 border text-center space-x-2">
                        <a href="{{ route('cities.edit', $city->id) }}"
                           class="inline-block px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded">
                            Edit
                        </a>
                        <form action="{{ route('cities.destroy', $city->id) }}" method="POST" class="inline-block"
                              onsubmit="return confirm('Yakin ingin menghapus kota ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="p-4 text-center text-gray-500 italic">
                        Tidak ada data kota
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
