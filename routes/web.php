<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\PromoController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\CinemaController;
use App\Http\Controllers\StudioController;
use App\Http\Controllers\CinemaPriceController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', function () {
    return view('welcome');
});




Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('admin.dashboard', function () {
        return view('admin/dashboard'); // ini akan ambil dashboard.blade.php
    })->name('admin.dashboard');
});


//Tambah Kota
Route::get('/admin/tambah/add_city', [CityController::class, 'create'])->name('cities.create');
Route::post('/cities', [CityController::class, 'store'])->name('cities.store');
Route::get('/admin/city', [CityController::class, 'index'])->name('cities.index');
Route::resource('cities', CityController::class);




//Promo
Route::get('/admin/tambah/add_promo', [PromoController::class, 'create'])->name('promos.create');
Route::post('/promos', [PromoController::class, 'store'])->name('promos.store');
Route::get('/admin/promo', [PromoController::class, 'index'])->name('promos.index'); // Tambahkan route untuk menampilkan daftar promo
Route::resource('promos', PromoController::class)->middleware('auth'); 



//Movies
Route::get('/movies', [MovieController::class, 'index'])->name('movies.index');
Route::get('/movies/create', [MovieController::class, 'create'])->name('movies.create');
Route::post('/movies', [MovieController::class, 'store'])->name('movies.store');
Route::get('/movies/{id}/edit', [MovieController::class, 'edit'])->name('movies.edit');
Route::put('/movies/{id}', [MovieController::class, 'update'])->name('movies.update');
Route::delete('/movies/{id}', [MovieController::class, 'destroy'])->name('movies.destroy');



//Cinema
Route::get('/cinemas', [CinemaController::class, 'index'])->name('cinemas.index');
Route::get('/cinemas/create', [CinemaController::class, 'create'])->name('cinemas.create');
Route::post('/cinemas', [CinemaController::class, 'store'])->name('cinemas.store');
Route::get('/cinemas', [CinemaController::class, 'index'])->name('cinemas.index');
Route::resource('cinemas', CinemaController::class);




Route::resource('studios', StudioController::class);
Route::resource('prices', CinemaPriceController::class);


//Studio
Route::get('/studios', [StudioController::class, 'index'])->name('studios.index');
Route::get('/studios/create', [StudioController::class, 'create'])->name('studios.create');
Route::post('/studios', [StudioController::class, 'store'])->name('studios.store');
Route::get('/studios/{id}/edit', [StudioController::class, 'edit'])->name('studios.edit');
Route::put('/studios/{id}', [StudioController::class, 'update'])->name('studios.update'); // <-- pakai PUT
Route::delete('/studios/{id}', [StudioController::class, 'destroy'])->name('studios.destroy');






// Cinema
Route::get('/admin/cinema', [CinemaController::class, 'index'])->name('cinemas.index');
Route::get('/admin/tambah/add_cinema', [CinemaController::class, 'create'])->name('cinemas.create');
Route::post('/admin/cinema', [CinemaController::class, 'store'])->name('cinemas.store');
Route::get('/admin/edit/{id}/edit_cinema', [CinemaController::class, 'edit'])->name('cinemas.edit');
Route::put('/admin/cinema/{id}', [CinemaController::class, 'update'])->name('cinemas.update');
Route::delete('/admin/cinema/{id}', [CinemaController::class, 'destroy'])->name('cinemas.destroy');

// Cinema Price
Route::get('/admin/cinema_price', [CinemaPriceController::class, 'index'])->name('prices.index');
Route::get('/admin/tambah/add_cinema_price', [CinemaPriceController::class, 'create'])->name('prices.create');
Route::post('/admin/cinema_price', [CinemaPriceController::class, 'store'])->name('prices.store');
Route::get('/admin/edit/{price}/edit_cinema_price', [CinemaPriceController::class, 'edit'])->name('prices.edit');
Route::put('/admin/cinema_price/{price}', [CinemaPriceController::class, 'update'])->name('prices.update');
Route::delete('/admin/cinema_price/{price}', [CinemaPriceController::class, 'destroy'])->name('prices.destroy');




