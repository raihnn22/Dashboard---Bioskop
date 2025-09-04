@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6 text-gray-700">Daftar Cinema</h2>

    @if(session('success'))
        <div class="mb-4 bg-green-100 text-green-700 p-3 rounded">
            {{ session('success') }}
        </div>
    @endif

    <div class="flex justify-start mb-4">
        <a href="{{ route('cinemas.create') }}" 
           class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded shadow">
            + Tambah Cinema
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-100 text-gray-700 text-left">
                    <th class="p-3 border">#</th>
                    <th class="p-3 border">Nama Cinema</th>
                    <th class="p-3 border">Kota</th>
                    <th class="p-3 border text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cinemas as $cinema)
                <tr class="hover:bg-gray-50">
                    <td class="p-3 border text-center">{{ $loop->iteration }}</td>
                    <td class="p-3 border">{{ $cinema->name }}</td>
                    <td class="p-3 border">{{ $cinema->city->name }}</td>
                    <td class="p-3 border text-center space-x-2">
                        <a href="{{ route('cinemas.edit', $cinema->id) }}" 
                           class="inline-block px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded">
                           Edit
                        </a>
                        <form action="{{ route('cinemas.destroy', $cinema->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded" 
                                    onclick="return confirm('Yakin hapus cinema ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500">Belum ada cinema</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
