<?php

use App\Http\Controllers\ModeleVehiculeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehiculeController;
use App\Http\Controllers\ReservationController;
use App\Models\Models;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');
Route::get('/contacts', function () {
    return view('contact');
})->name('contact');
// Vehicules
Route::get('/vehicules', [VehiculeController::class,"index"])->name('vehicules.index');
Route::get('/vehicules/create', [VehiculeController::class,"create"])->name('vehicules.create');
Route::get('/vehicules/delete/{id}', [VehiculeController::class,"destroy"])->name('vehicules.destroy');
Route::get('/vehicules/edit/{id}', [VehiculeController::class,"edit"])->name('vehicules.edit');
Route::post('/vehicules/update/{id}', [VehiculeController::class,"update"])->name('vehicules.update');
Route::post('/vehicules/store', [VehiculeController::class,"store"])->name('vehicules.store');
// Resever
Route::get('/reserver/vehicule/{vehiculeId}', [ReservationController::class,"index"])->name('reserver.index');
Route::get('/reserver/create/vehicule/{vehiculeId}', [ReservationController::class,"create"])->name('reserver.create');
Route::post('/reserver/store/vehicule/{vehiculeId}', [ReservationController::class,"store"])->name('reserver.store');
Route::get('/reserver/delete/reservation/{reservationId}', [ReservationController::class,"destroy"])->name('reserver.destroy');
Route::get('/reserver/edit/reservation/{reservationId}/vehicule/{vehiculeId}', [ReservationController::class,"edit"])->name('reserver.edit');
Route::post('/reserver/update/reservation/{reservationId}/vehicule/{vehiculeId}', [ReservationController::class,"update"])->name('reserver.update');

Route::get('/reserveation', [ReservationController::class,"indexall"])->name('reservation.index');
Route::get('/reserveation/{userId}', [ReservationController::class,"indexparUser"])->name('reservationuser.index');
Route::post('/reserveation/confirm/{reservationId}', [ReservationController::class,"confirm"])->name('reservation.confirm');
Route::post('/reserveation/noconfirm/{reservationId}', [ReservationController::class,"noconfirm"])->name('reservation.noconfirm');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('getModele/{id}', function ($id) {
    $modele = Models::where('marque_id','=',$id)->get();
    return response()->json($modele);
});
require __DIR__.'/auth.php';
