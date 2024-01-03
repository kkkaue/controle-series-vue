<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('series', \App\Http\Controllers\SeriesController::class);

Route::get('/series/{series}/seasons', [\App\Http\Controllers\SeasonsController::class, 'index'])->name('seasons.index');

Route::get('/seasons/{season}/episodes', [\App\Http\Controllers\EpisodesController::class, 'index'])->name('episodes.index');
Route::post('/seasons/{season}/episodes/whatch', [\App\Http\Controllers\EpisodesController::class, 'watch'])->name('episodes.watch');

require __DIR__.'/auth.php';
