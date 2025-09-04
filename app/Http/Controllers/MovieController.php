<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    // Menampilkan semua film
    public function index()
    {
        $movies = Movie::all();
        return view('admin.movie', compact('movies'));
    }

    // Form tambah film
    public function create()
    {
        return view('admin.tambah.add_movie');
    }

    // Simpan film baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|integer',
            'age' => 'required|string|max:10',
            'animation_type' => 'nullable|string|max:50',
            'trailer' => 'nullable|string',
            'start_showing' => 'required|date',
            'start_selling' => 'required|date',
            'synopsis' => 'nullable|string',
            'producer' => 'nullable|string|max:255',
            'director' => 'nullable|string|max:255',
            'writer' => 'nullable|string|max:255',
            'production' => 'nullable|string|max:255',
        ]);

        $movie = Movie::create($request->all());

        // Simpan aktor jika ada
        if ($request->has('actors')) {
            foreach ($request->actors as $index => $actorName) {
                $actor = new \App\Models\Actor();
                $actor->name = $actorName;
                $actor->movie_id = $movie->id;

                // Upload foto jika ada
                if (isset($request->actor_photos[$index])) {
                    $path = $request->actor_photos[$index]->store('actors', 'public');
                    $actor->photo = $path;
                }

                $actor->save();
            }
        }

        return redirect()->route('movies.index')->with('success', 'Film berhasil ditambahkan.');
    }


    // Form edit film
    public function edit($id)
    {
        $movie = Movie::findOrFail($id);
        return view('admin.edit.edit_movie', compact('movie'));
    }

    // Update film
    public function update(Request $request, $id)
    {
        $movie = Movie::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'duration' => 'required|integer',
            'age' => 'required|string|max:10',
            'animation_type' => 'nullable|string|max:50',
            'trailer' => 'nullable|string',
            'start_showing' => 'required|date',
            'start_selling' => 'required|date',
            'synopsis' => 'nullable|string',
            'producer' => 'nullable|string|max:255',
            'director' => 'nullable|string|max:255',
            'writer' => 'nullable|string|max:255',
            'production' => 'nullable|string|max:255',
        ]);

        if ($request->has('actors')) {
            foreach ($request->actors as $actorData) {
                if (isset($actorData['id'])) {
                    // update aktor lama
                    $actor = $movie->actors()->find($actorData['id']);
                    if ($actor) {
                        $actor->name = $actorData['name'];
                        if (isset($actorData['photo'])) {
                            $actor->photo = $actorData['photo']->store('actors', 'public');
                        }
                        $actor->save();
                    }
                } else {
                    // tambah aktor baru
                    $path = null;
                    if (isset($actorData['photo'])) {
                        $path = $actorData['photo']->store('actors', 'public');
                    }
                    $movie->actors()->create([
                        'name' => $actorData['name'],
                        'photo' => $path,
                    ]);
                }
            }
        }

        return redirect()->route('movies.index')->with('success', 'Film berhasil diperbarui!');
    }

    // Hapus film
    public function destroy($id)
    {
        $movie = Movie::findOrFail($id);
        $movie->delete();

        return redirect()->route('movies.index')->with('success', 'Film berhasil dihapus');
    }
}
