<?php

use App\Http\Controllers\RiwayatController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DiagnosaController;

Route::get('/', function () {
    return view('home');
});

Route::get('/diagnosa', [DiagnosaController::class, 'index']);
Route::post('/diagnosa/proses', [DiagnosaController::class, 'proses']);
Route::get('/riwayat', [RiwayatController::class, 'index'])
    ->name('riwayat');

Route::get('/penyakit', function () {
    return view('penyakit');
});
