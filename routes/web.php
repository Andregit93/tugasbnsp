<?php

use App\Http\Controllers\BeasiswaController;
use App\Models\Beasiswa;
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
    $ipk = number_format(mt_rand(200, 380) / 100, 2);
    return view('index', [
        'ipk' => $ipk,
        'beasiswa' => Beasiswa::all()
    ]);
});

Route::post('/hasil', [BeasiswaController::class, 'hasil']);

Route::get('/beasiswa', function () {
    return view('beasiswa', [
        'beasiswa' => Beasiswa::all()
    ]);
});

Route::post('/beasiswa', [BeasiswaController::class, 'tambahBeasiswa']);
