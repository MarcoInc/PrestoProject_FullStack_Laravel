<?php

use App\Http\Controllers\GuestHouseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;

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

Route::get('/', [PublicController::class , 'home'])->name('home');

//Articoli
Route::get('/crea-articolo', [GuestHouseController::class , 'create'])->name('create');
Route::get('/all/articles', [PublicController::class, 'index'])->name('index');
Route::get('/detail/{id}', [GuestHouseController::class, 'show'])->name('show');
Route::delete('/delete/{house}',[GuestHouseController::class,'destroy'])->name('delete');
Route::get('/modifica/{house}',[GuestHouseController::class,'edit'])->name('edit');

