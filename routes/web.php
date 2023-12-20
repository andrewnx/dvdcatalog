<?php

use App\Http\Controllers\DvdController;
use App\Http\Controllers\FormatController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProfileController;
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


Route::get('/', [DvdController::class, 'index'])->name('index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('dvds', DvdController::class);
Route::resource('formats', FormatController::class);
Route::resource('types', TypeController::class);
Route::resource('locations', LocationController::class);

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resource routes for Dvd, Format, Type, and Location

});

require __DIR__ . '/auth.php';
