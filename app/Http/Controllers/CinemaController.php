<?php

namespace App\Http\Controllers;

use App\Models\Cinema;
use App\Models\City;
use Illuminate\Http\Request;

class CinemaController extends Controller
{
    public function index()
    {
        $cinemas = Cinema::with('city')->get();
        return view('admin.cinema', compact('cinemas'));
    }

    public function create()
    {
        $cities = City::all();
        return view('admin.tambah.add_cinema', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'address' => 'required|string',
        ]);

        Cinema::create([
            'name'    => $request->name,
            'city_id' => $request->city_id,
            'address' => $request->address,
        ]);

        return redirect()->route('cinemas.index')->with('success', 'Cinema berhasil ditambahkan');
    }

    public function edit($id)
    {
        $cinema = Cinema::findOrFail($id);
        $cities = City::all();
        return view('admin.edit.edit_cinema', compact('cinema', 'cities'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'address' => 'required|string',
        ]);

        $cinema = Cinema::findOrFail($id);
        $cinema->update([
            'name'    => $request->name,
            'city_id' => $request->city_id,
            'address' => $request->address,
        ]);

        return redirect()->route('cinemas.index')->with('success', 'Cinema berhasil diperbarui');
    }

    public function destroy($id)
    {
        $cinema = Cinema::findOrFail($id);
        $cinema->delete();

        return redirect()->route('cinemas.index')->with('success', 'Cinema berhasil dihapus');
    }
}
