@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h2 class="text-xl font-bold mb-4">Tambah Kursi untuk Ticket: {{ $ticket->movie->title }}</h2>

    <form action="{{ route('seats.store', $ticket->id) }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block font-semibold mb-1">Rows</label>
            <input type="text" name="rows" class="w-full border p-2 rounded" placeholder="contoh: A,B,C">
        </div>

        <div class="mb-4">
            <label class="block font-semibold mb-1">Jumlah kursi per baris</label>
            <input type="number" name="per_row" class="w-full border p-2 rounded" placeholder="contoh: 10">
        </div>

        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded">Generate Kursi</button>
    </form>
</div>
@endsection