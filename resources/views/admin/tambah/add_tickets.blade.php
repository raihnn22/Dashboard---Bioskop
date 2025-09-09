@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-8 bg-white rounded-lg shadow">
    <h1 class="text-2xl font-bold mb-6 text-gray-700">Tambah Tiket</h1>

    @if ($errors->any())
    <div class="mb-4 bg-red-100 text-red-700 p-3 rounded">
        <ul class="list-disc list-inside">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('tickets.store') }}" method="POST" id="ticketForm" class="space-y-4">
        @csrf

        {{-- Pilih Movie --}}
        <div>
            <label class="block mb-2 font-medium">Pilih Film</label>
            <select name="movie_id" class="w-full border rounded px-3 py-2" required>
                <option value="">Pilih Film</option>
                @foreach($movies as $movie)
                <option value="{{ $movie->id }}">{{ $movie->title }}</option>
                @endforeach
            </select>
        </div>

        {{-- Pilih Cinema + Studio --}}
        <div>
            <select name="studio_id" id="studio_id" class="w-full border rounded px-3 py-2" required>
                <option value="">Pilih Studio</option>
                @foreach($studios as $studio)
                <option value="{{ $studio->id }}">
                    {{ $studio->name }} - {{ $studio->cinema->name }} ({{ $studio->cinema->city->name }})
                </option>
                @endforeach
            </select>

        </div>

        {{-- Tanggal --}}
        <div>
            <label class="block mb-2 font-medium">Tanggal</label>
            <input type="date" name="date" id="date" class="w-full border rounded px-3 py-2" required>
        </div>

        {{-- Jam Tayang --}}
        <div>
            <label class="block mb-2 font-medium">Jam Tayang</label>
            <input type="time" name="time" class="w-full border rounded px-3 py-2" required>
        </div>

        {{-- Harga Otomatis --}}
        <div>
            <label class="block mb-2 font-medium">Harga Tiket</label>
            <input type="text" id="price_display" class="w-full border rounded px-3 py-2 bg-gray-100" readonly>
            <input type="hidden" name="price" id="price">
        </div>

        <div class="flex justify-between">
            <a href="{{ route('tickets.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">Kembali</a>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Simpan</button>
        </div>
    </form>
</div>

<script>
    const dateInput = document.getElementById('date');
    const studioSelect = document.getElementById('studio_id');
    const priceInput = document.getElementById('price');
    const priceDisplay = document.getElementById('price_display');

    function fetchPrice() {
        const studioId = studioSelect.value;
        const date = dateInput.value;

        if (!studioId || !date) {
            priceInput.value = "";
            priceDisplay.value = "";
            return;
        }

        fetch("{{ route('tickets.getPrice') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({
                    studio_id: studioId,
                    date: date
                })
            })
            .then(res => res.json())
            .then(data => {
                if (data.price !== undefined) {
                    priceInput.value = data.price;
                    priceDisplay.value = "Rp " + new Intl.NumberFormat('id-ID').format(data.price);
                } else {
                    priceInput.value = "";
                    priceDisplay.value = "";
                }
            })
            .catch(err => console.error(err));
    }

    dateInput.addEventListener('change', fetchPrice);
    studioSelect.addEventListener('change', fetchPrice);
</script>


@endsection