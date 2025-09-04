@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6 text-gray-700">Daftar Promo</h2>

    <div class="flex justify-start mb-4">
        <a href="{{ route('promos.create') }}"
            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded shadow">
            + Tambah Promo
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-100 text-gray-700 text-left">
                    <th class="p-3 border">ID</th>
                    <th class="p-3 border">Cover</th>
                    <th class="p-3 border">Nama</th>
                    <th class="p-3 border">Berakhir</th>
                    <th class="p-3 border">Deskripsi</th>
                    <th class="p-3 border">Syarat</th>
                    <th class="p-3 border text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($promos as $promo)
                <tr class="hover:bg-gray-50">
                    <td class="p-3 border text-center">{{ $promo->id }}</td>
                    <td class="p-3 border text-center">
                        @if($promo->cover)
                        <img src="{{ asset('storage/'.$promo->cover) }}" alt="cover" class="h-16 mx-auto rounded">
                        @else
                        <span class="text-gray-400 italic">Tidak ada</span>
                        @endif
                    </td>
                    <td class="p-3 border">{{ $promo->name }}</td>
                    <td class="p-3 border">{{ $promo->berakhir ?? '-' }}</td>
                    <td class="p-3 border">{{ $promo->deskripsi ?? '-' }}</td>
                    <td class="p-3 border">{{ $promo->syarat ?? '-' }}</td>
                    <td class="p-3 border text-center space-x-2">
                        <a href="{{ route('promos.edit', $promo->id) }}"
                            class="inline-block px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded">
                            Edit
                        </a>
                        <form action="{{ route('promos.destroy', $promo->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded"
                                onclick="return confirm('Yakin ingin menghapus promo ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="p-4 text-center text-gray-500">Belum ada data promo</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection