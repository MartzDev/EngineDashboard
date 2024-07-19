<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('bienvenido');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $users = DB::table('users')->orderBy('id')->paginate(5,['id', 'name', 'email'], 'pageUsers');
        return view('dashboard', compact('users'));
    })->name('dashboard');
});
