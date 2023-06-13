<?php

use App\Http\Controllers\GuestHouseController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;
use App\Models\GuestHouse;

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

//Pagine normali
Route::get('/', [PublicController::class , 'home'])->name('home');
Route::get('/terms', [PublicController::class , 'terms'])->name('terms');
Route::get('/privacy', [PublicController::class , 'privacy'])->name('privacy');
Route::get('/services', [PublicController::class , 'services'])->name('services');


//Articoli
Route::get('/crea-articolo', [GuestHouseController::class , 'create'])->name('create');
Route::get('/all/articles', [PublicController::class, 'index'])->name('index');
Route::get('/detail/{id}', [GuestHouseController::class, 'show'])->name('show');
Route::delete('/delete/{house}',[GuestHouseController::class,'destroy'])->name('delete');
Route::get('/modifica/{house}',[GuestHouseController::class,'edit'])->name('edit');


Route::get('/category-show/{location}', [PublicController::class, 'categoryShow'])->name('categoryShow');

//Revisore
Route::get('/revisor/index', [RevisorController::class, 'revisorIndex'])->middleware('isRevisor')->name('revisorIndex');
Route::patch('/revisor/accept/{house_toCheck}', [RevisorController::class, 'acceptAnnuncio'])->middleware('isRevisor')->name('revisor.accept');
Route::patch('/revisor/reject/{house_toCheck}', [RevisorController::class, 'rejectAnnuncio'])->middleware('isRevisor')->name('revisor.reject');

Route::get('/revisor/history/', [RevisorController::class, 'history'])->middleware('isRevisor')->name('revisor.history');
Route::patch('/revisor/history/reset/{house}', [RevisorController::class, 'resetRevision'])->middleware('isRevisor')->name('revisor.resetRevision');

Route::get('/become/revisor', [RevisorController::class, 'becomeRevisor'])->name('become.revisor');
Route::get('/make/revisor/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');

//Email
Route::get('/contattaci', [PublicController::class, 'contactUs'])->name('contattaci');

//Ricerca
Route::get('/ricerca/house', [PublicController::class, 'searchHouse'])->name('product.search');

//Profilo
Route::get('/profilo', [PublicController::class, 'profilo'])->name('profilo');

//Utenti
Route::get('/user/{id}', [PublicController::class, 'userProfile'])->name('userProfile');

//Lingua
Route::post('/language/{lang}', [PublicController::class, 'setLanguage'])->name('setLanguage');




