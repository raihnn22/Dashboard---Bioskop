@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">
        Kursi untuk Ticket: {{ $ticket->movie->title }} - Studio {{ $ticket->studio->name }}
    </h2>

    <a href="{{ route('seats.create', $ticket->id) }}" class="px-4 py-2 bg-blue-600 text-white rounded">Tambah Kursi</a>

    <table class="w-full border-collapse border mt-4">
        <thead>
            <tr class="bg-gray-200">
                <th class="border p-2">ID</th>
                <th class="border p-2">Seat Number</th>
                <th class="border p-2">Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($seats as $seat)
            <tr>
                <td class="border p-2">{{ $seat->id }}</td>
                <td class="border p-2">{{ $seat->seat_number }}</td>
                <td class="border p-2">{{ $seat->status }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
