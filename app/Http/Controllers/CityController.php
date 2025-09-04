<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function create()
    {
        return view('admin.tambah.add_city');
    }

    public function index()
    {
        $cities = City::all();
        return view('admin.city', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        City::create([
            'name' => $request->name,
        ]);

        return redirect()->route('cities.index')->with('success', 'Kota berhasil ditambahkan.');
    }

    // 👉 Form edit
    public function edit($id)
    {
        $city = City::findOrFail($id);
        return view('admin.edit.edit_city', compact('city'));
    }

    // 👉 Proses update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $city = City::findOrFail($id);
        $city->update([
            'name' => $request->name,
        ]);

        return redirect()->route('cities.index')->with('success', 'Kota berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        return redirect()->route('cities.index')->with('success', 'Kota berhasil dihapus.');
    }
}
