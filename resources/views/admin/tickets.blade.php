@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-700">Daftar Tiket</h1>

    @if(session('success'))
    <div class="mb-4 bg-green-100 text-green-700 p-3 rounded">
        {{ session('success') }}
    </div>
    @endif

    <div class="flex justify-start mb-4">
        <a href="{{ route('tickets.create') }}"
            class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
            Tambah Tiket
        </a>
    </div>

    <table class="w-full border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">Film</th>
                <th class="border px-4 py-2">Studio</th>
                <th class="border px-4 py-2">Cinema</th>
                <th class="border px-4 py-2">Kota</th>
                <th class="border px-4 py-2">Tanggal</th>
                <th class="border px-4 py-2">Jam</th>
                <th class="border px-4 py-2">Harga</th>
                <th class="border px-4 py-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($tickets as $ticket)
            <tr>
                <td class="border px-4 py-2">{{ $ticket->movie->title ?? '-' }}</td>
                <td class="border px-4 py-2">{{ $ticket->studio->name ?? '-' }}</td>
                <td class="border px-4 py-2">{{ $ticket->studio->cinema->name ?? '-' }}</td>
                <td class="border px-4 py-2">{{ $ticket->studio->cinema->city->name ?? '-' }}</td>
                <td class="border px-4 py-2">{{ $ticket->date }}</td>
                <td class="border px-4 py-2">{{ $ticket->time }}</td>
                <td class="border px-4 py-2">Rp {{ number_format($ticket->price, 0, ',', '.') }}</td>
                <td class="border px-4 py-2 text-center">
                    <a href="{{ route('tickets.edit', $ticket->id) }}"
                        class="bg-yellow-500 text-white px-3 py-1 rounded hover:bg-yellow-600">Edit</a>
                    <form action="{{ route('tickets.destroy', $ticket->id) }}" method="POST" class="inline-block"
                        onsubmit="return confirm('Yakin ingin menghapus tiket ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded hover:bg-red-700">
                            Delete
                        </button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center border px-4 py-2">Belum ada tiket</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection