<?php

use App\Http\Controllers\ChirpController;
use App\Http\Controllers\ContactosController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

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
    return view('bienvenido');
});

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

// El controlador de verificación de correo electrónico
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Reenvío del correo electrónico de verificación
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

// El Aviso de Verificación de Correo Electrónico
Route::get('/dashboard', function () {
    return view('dashboard.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// ruta de auto gestion del usuario
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ruta de chirps
Route::group(['prefix' => '/', 'as' => 'chirps.', 'middleware' => ['auth', 'verified']], function () {
    Route::resource('chirps', ChirpController::class)->except(['restore'])->names([
        'index' => 'index',
        'create' => 'create',
        'store' => 'store',
        'show' => 'show',
        'edit' => 'edit',
        'update' => 'update',
        'destroy' => 'destroy',
    ]);
    Route::put('/chirps/{id}/{chirp}/restaurar', [ChirpController::class, 'restore'])->name('restore');
});

// ruta de contactos
Route::group(['prefix' => '/', 'as' => 'contactos.', 'middleware' => ['auth', 'verified']], function () {
    Route::resource('contactos', ContactosController::class)->except(['restore'])->names([
        'index' => 'index',
        'create' => 'create',
        'store' => 'store',
        'show' => 'show',
        'edit' => 'edit',
        'update' => 'update',
        'destroy' => 'destroy',
    ]);
    Route::put('/contactos/{id}/{contacto}/restaurar', [ContactosController::class, 'restore'])->name('restore');
});

require __DIR__ . '/auth.php';
