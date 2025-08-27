<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BirraController; // <-- SBLOCCATO
use App\Http\Controllers\PrenotazioneController;

/*
|--------------------------------------------------------------------------
| Rotte Pubbliche (guest)
|--------------------------------------------------------------------------
*/

Route::get('/', fn () => view('home'))->name('home');
// Route::get('/', fn () => view('welcome'))->name('home'); // alternativa

Route::view('/chi-siamo', 'chi-siamo')->name('chi-siamo');
Route::view('/contatti', 'contatti')->name('contatti');

Route::get('/prenotazioni', function () {
    return view('prenotazioni.index');
})->name('prenotazioni');
Route::post('/prenotazioni', [App\Http\Controllers\PrenotazioneController::class, 'store'])
    ->middleware('auth')
    ->name('prenotazioni.store');

// Lista birre (PUBBLICA) -> usata dalla navbar con route('birre.index')
Route::get('/birre', [BirraController::class, 'index'])->name('birre.index');

Route::get('/admin/prenotazioni', [PrenotazioneController::class, 'index'])
    ->middleware(['auth', 'is_admin'])
    ->name('admin.prenotazioni.index');
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



Route::delete('/admin/prenotazioni/{prenotazione}', [PrenotazioneController::class, 'destroy'])
    ->middleware(['auth','is_admin'])
    ->name('admin.prenotazioni.destroy');

/*
|--------------------------------------------------------------------------
| (Opzionale) Area Utente con middleware personalizzato
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'is_user'])->group(function () {
    // Route::get('/i-miei-ordini', [OrderController::class, 'index'])->name('orders.index');
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

        // Esempi CRUD admin (LASCIA COMMENTATI se non li stai usando)
        // Route::resource('prodotti', Admin\ProductController::class);
        // Route::resource('birre', Admin\BirraController::class)->except(['show']);
    });


/*
|--------------------------------------------------------------------------
| Rotte di autenticazione Breeze
|--------------------------------------------------------------------------
*/
require __DIR__.'/auth.php';
