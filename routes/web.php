<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Backend\AdminController as AdminController;
use App\Http\Controllers\Interfaces\FrontController  as InterfacesFrontController ;


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
    return view('welcome');
});

//SECTION ADMINISTRATION
Route::get('/administration', [AdminController::class, 'index'])->name("admin.dashboard");

Route::get('/', [InterfacesFrontController::class, 'index'])->name("front.index");
Route::get('/demande-prestations', [InterfacesFrontController::class, 'demande_prestation'])->name("front.prestation");
Route::get('/devenir-prestataire', [InterfacesFrontController::class, 'prestataire'])->name("front.prestataire");
Route::get('/nous-contacter', [InterfacesFrontController::class, 'send_contact'])->name("front.contact");
route::get('/nos-prestations', [InterfacesFrontController::class, 'all_prestations'])->name("front.nos-prestations");
route::get('/temoignages', [InterfacesFrontController::class, 'testimonial'])->name("front.temoingnage");
route::get('/assistance', [InterfacesFrontController::class, 'help'])->name("front.assistance");

//STORE FRONT
Route::post('/save.demandeprestation', [InterfacesFrontController::class, 'store'])->name("save.demandeprestation");
Route::post('/save.devenirprestataire', [InterfacesFrontController::class, 'store_prestataire'])->name("save.devenirprestataire");
Route::post('/save_contact', [InterfacesFrontController::class, 'store_contact'])->name("save_contact");

//NOS PRESTATIONS
Route::get('/liste/prestation', [AdminController::class, 'liste_prestation'])->name("liste-prestation");
Route::post('/save.prestation', [AdminController::class, 'save_prestation'])->name("save.prestation");
Route::put('/prestation.upate/{prestation}', [AdminController::class, 'update'])->name("prestation.upate");
Route::delete('/delete.prestation/{demandeprestation}', [AdminController::class, 'delete'])->name("delete.prestation");

//LISTE DES DEMANDES DE PRESTATIONS
Route::get('/liste/demande_prestation', [AdminController::class, 'liste_demande_prestation'])->name("liste/demande_prestation");
Route::put('/update.demande/{demandeprestation}', [AdminController::class, 'update_demande'])->name("update.demande");
Route::delete('/delete.demande/{id}', [AdminController::class, 'deletedemande'])->name("delete.demande");

//LISTE DES PRESTATAIRES
Route::get('/liste/devenirprestataire', [AdminController::class, 'list_prestataire'])->name("liste/devenirprestataire");

//AJOUT ETHNIES
Route::get('/liste.ethnie', [AdminController::class, 'liste_ethnie'])->name("liste.ethnie");
Route::post('/save_ethnie', [AdminController::class, 'enregis_ethnie'])->name("save_ethnie");
Route::put('/ethnie.update/{ethnie}', [AdminController::class, 'update_ethnie'])->name("ethnie.update");
Route::delete('/delete.ethnie/{ethnie}', [AdminController::class, 'delete_ethnie'])->name("delete.ethnie");

//AJOUT MODES
Route::get('/liste.modes', [AdminController::class, 'liste_mode'])->name("liste.modes");
Route::post('/store.mode', [AdminController::class, 'enregis_mode'])->name("store.mode");
Route::put('/update.mode/{mode}', [AdminController::class, 'update_mode'])->name("update.mode");
Route::delete('/delete.mode/{id}', [AdminController::class, 'delete_mode'])->name("delete.mode");

//AJOUT DIPLOMES
Route::get('/ajout/diplome', [AdminController::class, 'liste_diplome'])->name("ajout/diplome");
Route::post('/save/diplome', [AdminController::class, 'enregis_diplome'])->name("save/diplome");
Route::put('/update.diplome/{diplome}', [AdminController::class, 'update_diplome'])->name("update.diplome");
Route::delete('/delete.diplome/{diplome}', [AdminController::class, 'delete_diplome'])->name("delete.diplome");

//AJOUT ALPHABETISATION
Route::get('/ajout/alphabetisation', [AdminController::class, 'add_alphabet'])->name("ajout/alphabetisation");
Route::post('/save.alphabet', [AdminController::class, 'enregistre_alphabet'])->name("save.alphabet");
Route::put('/update.alpha/{alphabet}', [AdminController::class, 'update_alphabet'])->name("update.alpha");
Route::delete('/delete.alpha/{alphabet}', [AdminController::class, 'delete_alphabet'])->name("delete.alpha");

//AJOUT CANAL DE RENCONTRE AVEC ALLO SERVICE
Route::get('/ajout.rencontre', [AdminController::class, 'ajout_canal_rencontre'])->name("ajout.rencontre");
Route::post('/store.canal', [AdminController::class, 'save_canal_rencontre'])->name("store.canal");
Route::put('/update.canal/{canal}', [AdminController::class, 'updatecanal'])->name("update.canal");
Route::delete('/delete.canal/{id}', [AdminController::class, 'delete_canal'])->name("delete.canal");

//AJOUT DE DISPONIBILITE
Route::get('/ajout.disponibilite', [AdminController::class, 'add_dispo'])->name("ajout.disponibilite");
Route::post('/save.dispo', [AdminController::class, 'save_dispo'])->name("save.dispo");
Route::put('/update.disponibilite/{dispo}', [AdminController::class, 'update_dispo'])->name("update.disponibilite");
Route::delete('/delete.dispo/{id}', [AdminController::class, 'delete_dispo'])->name("delete.dispo");

//NATURE PIECES
Route::get('/nature.piece', [AdminController::class, 'nature_piece'])->name("nature.piece");
Route::post('/store.pieces', [AdminController::class, 'save_nature_piece'])->name("store.pieces");
Route::put('/update.piece/{naturepiece}', [AdminController::class, 'update_piece'])->name("update.piece");
Route::delete('/delete.naturepiece/{id}', [AdminController::class, 'delete_nature_piece'])->name("delete.naturepiece");

//AJOUT COMMUNE
Route::get('/communes', [AdminController::class, 'list_commune'])->name("ajout.commune");
Route::post('/store.commune', [AdminController::class, 'save_commune'])->name("store.commune");
Route::put('/update.commune/{comm}', [AdminController::class, 'update_commune'])->name("update.commune");
Route::delete('/delete.commune/{id}', [AdminController::class, 'delete_commune'])->name("delete.commune");

//AJOUT DOMAINE
Route::get('/ajout/quartier', [AdminController::class, 'add_quartier'])->name("ajout/quartier");
Route::post('/store.quartier', [AdminController::class, 'save_quartier'])->name("store.quartier");
Route::put('/update.quartier/{quartier}', [AdminController::class, 'update_tiek'])->name("update.quartier");
Route::delete('/destroy.quartier/{id}', [AdminController::class, 'destroy'])->name("destroy.quartier");
