<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\FournisseurController;
use App\Http\Controllers\MaladieController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\TraitementController;
use App\Http\Controllers\VenteController;
use App\Http\Controllers\TodayController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RendezVousController;
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

Route::get('/', function () {
    return view('auth/login');
});
Route::get('/acceuil', function () {
    return view('dashboard');
});
Route::get('dashboard', [DashboardController::class, "index"]);


Route::resource('patient', PatientController::class);
Route::resource('maladie', MaladieController::class);
Route::resource('produit', ProduitController::class);
Route::resource('traitement', TraitementController::class);
Route::resource('fournisseur', FournisseurController::class);
Route::resource('vente', VenteController::class);
Route::resource('client', ClientController::class);
Route::resource('consultation', ConsultationController::class);


Route::get('/rendez-vous', [RendezVousController::class, "index"]);
Route::post('/add_rendezvous', [RendezVousController::class, "store"]);

Route::get('getproduit',[VenteController::class,"getProduitData"])->name('getproduit') ; 
Route::get("test",function(){
    return view("test") ; 
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//TodayList
Route::post('addToday', [DashboardController::class,"storeToday"]);