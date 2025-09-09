@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-6 text-gray-700">Daftar Tiket</h2>

    {{-- Tombol Tambah --}}
    <div class="flex justify-start mb-4">
        <a href="{{ route('tickets.create') }}"
            class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded shadow">
            + Tambah Tiket
        </a>
    </div>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
    <div class="mb-4 bg-green-100 text-green-700 p-3 rounded">
        {{ session('success') }}
    </div>
    @endif

    {{-- Table --}}
    <div class="overflow-x-auto">
        <table class="w-full border border-gray-300 rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-gray-100 text-gray-700 text-left">
                    <th class="p-3 border text-center w-16">ID</th>
                    <th class="p-3 border">Film</th>
                    <th class="p-3 border">Studio</th>
                    <th class="p-3 border">Tanggal</th>
                    <th class="p-3 border">Jam</th>
                    <th class="p-3 border text-right">Harga</th>
                    <th class="p-3 border text-center w-70">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($tickets as $ticket)
                <tr class="hover:bg-gray-50">
                    <td class="p-3 border text-center">{{ $ticket->id }}</td>
                    <td class="p-3 border">{{ $ticket->movie->title }}</td>
                    <td class="p-3 border">{{ $ticket->studio->name }}</td>
                    <td class="p-3 border">{{ $ticket->date }}</td>
                    <td class="p-3 border">{{ $ticket->time }}</td>
                    <td class="p-3 border text-right">
                        Rp {{ number_format($ticket->price, 0, ',', '.') }}
                    </td>
                    <td class="p-3 border text-center space-x-2">
                        {{-- Lihat Kursi --}}
                        <a href="{{ route('seats.index', $ticket->id) }}"
                            class="inline-block px-3 py-1 bg-green-600 hover:bg-green-700 text-white rounded ">
                            Lihat Kursi
                        </a>

                        {{-- Edit Tiket --}}
                        <a href="{{ route('tickets.edit', $ticket->id) }}"
                            class="inline-block px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded">
                            Edit
                        </a>

                        {{-- Hapus Tiket --}}
                        <form action="{{ route('tickets.destroy', $ticket->id) }}"
                              method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded"
                                onclick="return confirm('Yakin mau hapus tiket ini?')">
                                Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="p-4 text-center text-gray-500">Belum ada tiket tersedia</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
