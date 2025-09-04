@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6 text-gray-700">Daftar Film</h2>

    @if(session('success'))
    <div class="bg-green-100 text-green-800 p-3 rounded mb-4">
        {{ session('success') }}
    </div>
    @endif

    <div class="flex justify-start mb-4">
        <a href="{{ route('movies.create') }}" 
           class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded shadow">
            + Tambah Film
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-100 text-gray-700 text-left">
                    <th class="p-3 border">#</th>
                    <th class="p-3 border">Judul</th>
                    <th class="p-3 border">Durasi</th>
                    <th class="p-3 border text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($movies as $movie)
                <tr class="hover:bg-gray-50">
                    <td class="p-3 border text-center">{{ $loop->iteration }}</td>
                    <td class="p-3 border">{{ $movie->title }}</td>
                    <td class="p-3 border">{{ $movie->duration }} menit</td>
                    <td class="p-3 border text-center space-x-2">
                        <a href="{{ route('movies.edit', $movie->id) }}" 
                           class="inline-block px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded">
                           Edit
                        </a>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" 
                                    class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded" 
                                    onclick="return confirm('Hapus film ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="p-4 text-center text-gray-500">Belum ada film</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
