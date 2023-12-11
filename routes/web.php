<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObatController;



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

Route::get('/obat',[ObatController::class,'obat']);
Route::get('/obat/riwayat',[ObatController::class,'arc']);
Route::get('/obat/riwayat/cetak',[ObatController::class,'print']);
Route::get('/obat/create',[ObatController::class,'create']);
Route::post('/obat/store',[ObatController::class,'store']);
Route::get('/obat/{id}/edit',[ObatController::class,'edit']);
Route::put('/obat/{id}',[ObatController::class,'update']);
Route::delete('/obat/{id}',[ObatController::class,'destroy']);

