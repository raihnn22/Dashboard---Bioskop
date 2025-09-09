<?php

namespace App\Http\Controllers;

use App\Models\Seat;
use App\Models\Ticket;
use Illuminate\Http\Request;

class SeatController extends Controller
{
    // Lihat kursi untuk tiket tertentu
    public function index($ticketId)
    {
        $ticket = Ticket::with('movie', 'studio')->findOrFail($ticketId);
        $seats = Seat::where('ticket_id', $ticketId)->get();

        return view('admin.seats', compact('ticket', 'seats'));
    }

    // Form untuk generate kursi
    public function create($ticketId)
    {
        $ticket = Ticket::findOrFail($ticketId);
        return view('admin.tambah.add_seats', compact('ticket'));
    }

    // Simpan kursi ke DB
    public function store(Request $request, $ticketId)
    {
        $request->validate([
            'rows' => 'required|string',  // misal A,B,C
            'per_row' => 'required|integer|min:1',
        ]);

        $ticket = Ticket::findOrFail($ticketId);

        $rows = explode(',', strtoupper($request->rows)); // contoh: A,B,C
        $perRow = $request->per_row;

        foreach ($rows as $row) {
            for ($i = 1; $i <= $perRow; $i++) {
                Seat::create([
                    'ticket_id'   => $ticket->id,
                    'seat_number' => $row . $i,
                    'status'      => 'available',
                ]);
            }
        }

        return redirect()->route('seats.index', $ticketId)
            ->with('success', 'Kursi berhasil dibuat.');
    }
}
