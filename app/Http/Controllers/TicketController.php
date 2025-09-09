<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Studio;
use App\Models\Ticket;
use Carbon\Carbon;

class TicketController extends Controller
{
    public function index()
    {
        $tickets = Ticket::with(['movie', 'studio.cinema.city'])
            ->latest()
            ->get();

        return view('admin.tickets', compact('tickets'));
    }

    public function create()
    {
        $movies = Movie::all();
        $studios = Studio::with('cinema.city')->get();

        return view('admin.tambah.add_tickets', compact('movies', 'studios'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'movie_id'  => 'required|exists:movies,id',
            'studio_id' => 'required|exists:studios,id',
            'date'      => 'required|date',
            'time'      => 'required',
            'price'     => 'required|numeric',
        ]);

        Ticket::create($request->all());

        return redirect()->route('tickets.index')->with('success', 'Tiket berhasil ditambahkan!');
    }

    public function edit(Ticket $ticket)
    {
        $movies = Movie::all();
        $studios = Studio::with('cinema.city')->get();

        return view('admin.tambah.edit_tickets', compact('ticket', 'movies', 'studios'));
    }

    public function update(Request $request, Ticket $ticket)
    {
        $request->validate([
            'movie_id'  => 'required|exists:movies,id',
            'studio_id' => 'required|exists:studios,id',
            'date'      => 'required|date',
            'time'      => 'required',
            'price'     => 'required|numeric',
        ]);

        $ticket->update($request->all());

        return redirect()->route('tickets.index')->with('success', 'Tiket berhasil diperbarui!');
    }

    public function destroy(Ticket $ticket)
    {
        $ticket->delete();

        return redirect()->route('tickets.index')->with('success', 'Tiket berhasil dihapus!');
    }

    public function getPrice(Request $request)
    {
        $studio = Studio::findOrFail($request->studio_id);
        $day = Carbon::parse($request->date)->format('l');

        if (in_array($day, ['Monday', 'Tuesday', 'Wednesday', 'Thursday'])) {
            $price = $studio->weekday_price;
        } elseif ($day == 'Friday') {
            $price = $studio->friday_price;
        } else {
            $price = $studio->weekend_price;
        }

        return response()->json(['price' => $price]);
    }
}
