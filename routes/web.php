<?php

use App\Http\Controllers\MaladieController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\Route;

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

Route::get('/acceuil', function () {
    return view('dashboard');
});


Route::resource('patient', PatientController::class);
Route::resource('maladie', MaladieController::class);
Route::resource('produit', ProduitController::class);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');