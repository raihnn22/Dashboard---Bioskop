<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromoController extends Controller
{
    public function create()
    {
        return view('admin.tambah.add_promo');
    }

    public function index()
    {
        $promos = Promo::all();
        return view('admin.promo', compact('promos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'name' => 'required|string|max:255',
            'berakhir' => 'required|date',
            'deskripsi' => 'required|string',
            'syarat' => 'required|string',
        ]);

        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->store('promos', 'public');
            $validated['cover'] = $path;
        }

        Promo::create($validated);

        return redirect()->route('promos.index')->with('success', 'Promo berhasil ditambahkan');
    }

    // 👉 form edit
    public function edit($id)
    {
        $promo = Promo::findOrFail($id);
        return view('admin.edit.edit_promo', compact('promo'));
    }

    // 👉 update promo
    public function update(Request $request, $id)
    {
        $promo = Promo::findOrFail($id);

        $validated = $request->validate([
            'cover' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'name' => 'required|string|max:255',
            'berakhir' => 'required|date',
            'deskripsi' => 'required|string',
            'syarat' => 'required|string',
        ]);

        // kalau ada cover baru, hapus lama
        if ($request->hasFile('cover')) {
            if ($promo->cover && Storage::disk('public')->exists($promo->cover)) {
                Storage::disk('public')->delete($promo->cover);
            }
            $path = $request->file('cover')->store('promos', 'public');
            $validated['cover'] = $path;
        }

        $promo->update($validated);

        return redirect()->route('promos.index')->with('success', 'Promo berhasil diperbarui');
    }

    // 👉 hapus promo
    public function destroy($id)
    {
        $promo = Promo::findOrFail($id);

        if ($promo->cover && Storage::disk('public')->exists($promo->cover)) {
            Storage::disk('public')->delete($promo->cover);
        }

        $promo->delete();

        return redirect()->route('promos.index')->with('success', 'Promo berhasil dihapus');
    }
}
