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
use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\RendezVousController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Auth\LoginController;
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
Auth::routes(['register' => false]);

Route::group(['middleware' => ['auth']], function () {
    // Route::get('/acceuil', function () {
    //     return view('dashboard');
    // });
    Route::get('logout', [LoginController::class,'logout']);
    Route::get('consult_payer', [DashboardController::class, "consult_payer"]);
    Route::get('tr_payer', [DashboardController::class, "tr_payer"]);
    Route::put('traitement_payer/{id}', [DashboardController::class, "traitement_payer"])->name('traitement_payer');
    Route::get('dashboard', [DashboardController::class, "index"]);

    Route::post('patient/add', [RendezVousController::class, "add"])->name('patient.add');
    Route::post('addToList', [RendezVousController::class, "add_today"])->name('addToList');
    Route::post('addToTrh', [DashboardController::class, "addToTrh"])->name('addToTrh');

    Route::resource('patient', PatientController::class);
    Route::resource('maladie', MaladieController::class);
    Route::resource('produit', ProduitController::class);
    Route::resource('traitement', TraitementController::class);
    Route::resource('fournisseur', FournisseurController::class);
    Route::resource('vente', VenteController::class);
    Route::resource('client', ClientController::class);
    Route::resource('consultation', ConsultationController::class);


    Route::get('/rendez-vous', [RendezVousController::class, "index"]);
    Route::get('/createrendezvous', [RendezVousController::class, "create"]);
    Route::post('/add_rendezvous', [RendezVousController::class, "store"]);

    Route::get('getproduit',[VenteController::class,"getProduitData"])->name('getproduit') ; 
    Route::get("test",function(){
        return view("test") ; 
    });


    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //TodayList
    Route::post('addToday', [DashboardController::class,"storeToday"]);


    // les roles et les permissions 
    Route::resource('permissions',PermissionsController::class); 
    Route::resource('roles',RolesController::class);
    Route::resource('users',UsersController::class);
    Route::post('add_dossier_medical', [DashboardController::class,"add_dossier_medical"]);
    Route::get('dossier_medical/{patient_id}', [DashboardController::class,"dossier_medical"]);
    Route::post('add_consult', [DashboardController::class,"add_consult"]);
    Route::post('add_maladie', [DashboardController::class,"add_maladie"]);
    Route::post('addvisite', [DashboardController::class,"addvisite"]);
    Route:: PUT('updateVisite/{id}', [DashboardController::class,"updateVisite"]);
    Route:: get('details_dossier/{id}', [DashboardController::class,"details_dossier"]);

});

