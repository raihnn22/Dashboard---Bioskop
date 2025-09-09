<?php

namespace App\Http\Controllers;

use App\Models\CinemaPrice;
use App\Models\Studio;
use Illuminate\Http\Request;

class CinemaPriceController extends Controller
{
    public function index()
    {
        $prices = CinemaPrice::with('studio.cinema.city')->get();
        return view('admin.cinema_price', compact('prices'));
    }

    public function create()
    {
        $studios = Studio::with('cinema.city')->get();
        return view('admin.tambah.add_cinema_price', compact('studios'));
    }

    public function store(Request $request)
    {
        CinemaPrice::create($request->validate([
            'studio_id' => 'required|exists:studios,id',
            'weekday_price' => 'required|integer',
            'friday_price' => 'required|integer',
            'weekend_price' => 'required|integer'
        ]));

        return redirect()->route('prices.index')->with('success', 'Data harga berhasil ditambahkan');
    }

    public function edit(CinemaPrice $price)
    {
        $studios = Studio::with('cinema.city')->get();
        return view('admin.edit.edit_cinema_price', compact('price', 'studios'));
    }

    public function update(Request $request, CinemaPrice $price)
    {
        $price->update($request->validate([
            'studio_id' => 'required|exists:studios,id',
            'weekday_price' => 'required|integer',
            'friday_price' => 'required|integer',
            'weekend_price' => 'required|integer'
        ]));

        return redirect()->route('prices.index')->with('success', 'Data harga berhasil diperbarui');
    }

    public function destroy(CinemaPrice $price)
    {
        $price->delete();
        return redirect()->route('prices.index')->with('success', 'Data harga berhasil dihapus');
    }
}