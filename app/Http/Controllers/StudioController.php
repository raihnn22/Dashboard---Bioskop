<?php

namespace App\Http\Controllers;

use App\Models\Studio;
use App\Models\Cinema;
use Illuminate\Http\Request;

class StudioController extends Controller
{
    // Halaman daftar studio
    public function index()
    {
        $studios = Studio::with('cinema')->get();
        return view('admin.studio', compact('studios'));
    }

    // Form tambah studio
    public function create()
    {
        $cinemas = Cinema::all();
        return view('admin.tambah.add_studio', compact('cinemas'));
    }

    // Simpan studio baru
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'cinema_id' => 'required|exists:cinemas,id',
        ]);

        Studio::create([
            'name'      => $request->name,
            'cinema_id' => $request->cinema_id,
        ]);

        return redirect()->route('studios.index')->with('success', 'Studio berhasil ditambahkan!');
    }

    // Form edit studio
    public function edit($id)
    {
        $studio  = Studio::findOrFail($id);
        $cinemas = Cinema::all();
        return view('admin.edit.edit_studio', compact('studio', 'cinemas'));
    }

    // Update studio
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'      => 'required|string|max:255',
            'cinema_id' => 'required|exists:cinemas,id',
        ]);

        $studio = Studio::findOrFail($id);
        $studio->update($request->only(['name', 'cinema_id']));

        return redirect()->route('studios.index')->with('success', 'Studio berhasil diperbarui!');
    }

    // Hapus studio
    public function destroy($id)
    {
        $studio = Studio::findOrFail($id);
        $studio->delete();

        return redirect()->route('studios.index')->with('success', 'Studio berhasil dihapus!');
    }
}
