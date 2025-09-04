@extends('layouts.app')

@section('content')
<div class="max-w-lg mx-auto p-6 bg-white rounded-lg shadow">
    <h2 class="text-2xl font-bold mb-4">Edit Studio</h2>

    <form action="{{ route('studios.update', $studio->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block mb-1">Pilih Cinema</label>
            <select name="cinema_id" class="w-full border p-2 rounded">
                @foreach($cinemas as $cinema)
                    <option value="{{ $cinema->id }}" @if($cinema->id == $studio->cinema_id) selected @endif>
                        {{ $cinema->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block mb-1">Nama Studio</label>
            <input type="text" name="name" value="{{ $studio->name }}" class="w-full border p-2 rounded" required>
        </div>

        <button class="px-4 py-2 bg-green-600 text-white rounded">Update</button>
    </form>
</div>
@endsection
