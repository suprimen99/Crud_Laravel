<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpolyedController;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/',[EmpolyedController::class,'index'])->name('pegawai');

Route::get('/tambahpegawai',[EmpolyedController::class,'tambahpegawai'])->name('tambah');

Route::post('/insertdata',[EmpolyedController::class,'insertdata'])->name('insertdata');

Route::get('/tampilkandata/{id}',[EmpolyedController::class,'tampilkandata'])->name('tampilkandata');

Route::post('/updatedata/{id}',[EmpolyedController::class,'updatedata'])->name('updatedata');

Route::get('/deletedata/{id}',[EmpolyedController::class,'deletedata'])->name('deletedata');

Route::get('/exportpdf',[EmpolyedController::class,'exportpdf'])->name('exportpdf');