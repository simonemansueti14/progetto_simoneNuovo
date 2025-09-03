<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BirraController;
use App\Http\Controllers\PrenotazioneController;
use App\Http\Controllers\Admin\UserController as AdminUserController; 

/*
|--------------------------------------------------------------------------
| Rotte Pubbliche (guest)
|--------------------------------------------------------------------------
*/
Route::get('/', fn () => view('home'))->name('home');
Route::view('/chi-siamo', 'chi-siamo')->name('chi-siamo');
Route::view('/contatti', 'contatti')->name('contatti');

Route::get('/prenotazioni', function () {
    return view('prenotazioni.index');
})->name('prenotazioni');

Route::post('/prenotazioni', [PrenotazioneController::class, 'store'])
    ->middleware('auth')
    ->name('prenotazioni.store');

// Lista birre 
Route::get('/birre', [BirraController::class, 'index'])->name('birre.index');

/*
|--------------------------------------------------------------------------
| Dashboard (Breeze) – utente verificato
|--------------------------------------------------------------------------
*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Area Utente (Breeze) – profilo dentro 'auth'
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Rotta per "Le mie prenotazioni" (solo utenti loggati)
Route::middleware(['auth'])->get(
    '/mie-prenotazioni',
    [PrenotazioneController::class, 'mie']
)->name('prenotazioni.mie');

Route::middleware('auth')->delete(
    '/mie-prenotazioni/{prenotazione}',
    [PrenotazioneController::class, 'destroyMine']
)->name('prenotazioni.mine.destroy');

/*
|--------------------------------------------------------------------------
| Area Utente con middleware personalizzato
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'is_user'])->group(function () {
});

/*
|--------------------------------------------------------------------------
| Area Admin (solo admin)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'is_admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::view('/dashboard', 'admin.dashboard')->name('dashboard');

        // Prenotazioni (admin)
        Route::get('/prenotazioni', [PrenotazioneController::class, 'index'])->name('prenotazioni.index');
        Route::delete('/prenotazioni/{prenotazione}', [PrenotazioneController::class, 'destroy'])->name('prenotazioni.destroy');

        // Utenti (admin)
        Route::get('/utenti', [AdminUserController::class, 'index'])->name('utenti.index');
        Route::delete('/utenti/{user}', [AdminUserController::class, 'destroy'])->name('utenti.destroy');

    });

/*
|--------------------------------------------------------------------------
| Rotte di autenticazione Breeze
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
