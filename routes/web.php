<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DomaineController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AssistanceController;
use App\Http\Controllers\Backend\AdminController as BackendAdminController;
use App\Http\Controllers\Interfaces\FrontController  as InterfacesFrontController ;
use App\Http\Controllers\TemoignageController;

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



Route::get('/administration', [BackendAdminController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('administration');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


//SECTION FRONT

Route::get('/', [InterfacesFrontController::class, 'index'])->name("front.index");
Route::get('/ask.prestation', [InterfacesFrontController::class, 'demande_prestation'])->name("ask.prestation");
Route::get('/demande-prest/{id}', [InterfacesFrontController::class, 'demande_prest'])->name("front.prest");
Route::get('/devenir-presta/{id}', [InterfacesFrontController::class, 'demande_presta'])->name("front.presta");
Route::get('/ask.prestataire', [InterfacesFrontController::class, 'prestataire'])->name("ask.prestataire");
Route::get('/nous-contacter', [InterfacesFrontController::class, 'send_contact'])->name("front.contact");
route::get('/nos-prestations', [InterfacesFrontController::class, 'all_prestations'])->name("front.nos-prestations");
route::get('/temoignages', [InterfacesFrontController::class, 'testimonial'])->name("front.temoingnage");
route::get('/detail.temoignage/{id}', [InterfacesFrontController::class, 'detail_temoignage'])->name("detail.temoignage");
route::get('/form.temoignage', [InterfacesFrontController::class, 'temoignage_form'])->name("form.temoignage");
route::post('/save.temoignage', [InterfacesFrontController::class, 'store_temoignage'])->name("save.temoignage");

route::get('/assistance', [InterfacesFrontController::class, 'help'])->name("front.assistance");

//STORE FRONT
Route::post('/save.demandeprestation', [InterfacesFrontController::class, 'store'])->name("save.demandeprestation");
Route::post('/save.devenirprestataire', [InterfacesFrontController::class, 'store_prestataire'])->name("save.devenirprestataire");
Route::post('/save_contact', [InterfacesFrontController::class, 'store_contact'])->name("save_contact");

//NOS PRESTATIONS
Route::get('/liste/prestation', [BackendAdminController::class, 'liste_prestation'])->name("liste-prestation");
Route::post('/save.prestation', [BackendAdminController::class, 'save_prestation'])->name("save.prestation");
Route::put('/prestation.upate/{prestation}', [BackendAdminController::class, 'update'])->name("prestation.upate");
Route::delete('/delete.prestation/{prestation}', [BackendAdminController::class, 'delete'])->name("delete.prestation");

//LISTE DES DEMANDES DE PRESTATIONS
Route::get('/liste/demande_prestation', [BackendAdminController::class, 'liste_demande_prestation'])->name("liste/demande_prestation");
Route::put('/update.demande/{demandeprestation}', [BackendAdminController::class, 'update_demande'])->name("update.demande");
Route::delete('/delete.demande/{id}', [BackendAdminController::class, 'deletedemande'])->name("delete.demande");

//LISTE DES PRESTATAIRES
Route::get('/liste/devenirprestataire', [BackendAdminController::class, 'list_prestataire'])->name("liste/devenirprestataire");
Route::put('/update.prestataire/{prestataire}', [BackendAdminController::class, 'update_prestataire'])->name("update.prestataire");
Route::delete('/delete.prestataire/{id}', [BackendAdminController::class, 'delete_prestataire'])->name("delete.prestataire");


//AJOUT ETHNIES
Route::get('/liste.ethnie', [BackendAdminController::class, 'liste_ethnie'])->name("liste.ethnie");
Route::post('/save_ethnie', [BackendAdminController::class, 'enregis_ethnie'])->name("save_ethnie");
Route::put('/ethnie.update/{ethnie}', [BackendAdminController::class, 'update_ethnie'])->name("ethnie.update");
Route::delete('/delete.ethnie/{ethnie}', [BackendAdminController::class, 'delete_ethnie'])->name("delete.ethnie");

//AJOUT MODES
Route::get('/liste.modes', [BackendAdminController::class, 'liste_mode'])->name("liste.modes");
Route::post('/store.mode', [BackendAdminController::class, 'enregis_mode'])->name("store.mode");
Route::put('/update.mode/{mode}', [BackendAdminController::class, 'update_mode'])->name("update.mode");
Route::delete('/delete.mode/{id}', [BackendAdminController::class, 'delete_mode'])->name("delete.mode");

//AJOUT DIPLOMES
Route::get('/ajout/diplome', [BackendAdminController::class, 'liste_diplome'])->name("ajout/diplome");
Route::post('/save/diplome', [BackendAdminController::class, 'enregis_diplome'])->name("save/diplome");
Route::put('/update.diplome/{diplome}', [BackendAdminController::class, 'update_diplome'])->name("update.diplome");
Route::delete('/delete.diplome/{diplome}', [BackendAdminController::class, 'delete_diplome'])->name("delete.diplome");

//AJOUT ALPHABETISATION
Route::get('/ajout/alphabetisation', [BackendAdminController::class, 'add_alphabet'])->name("ajout/alphabetisation");
Route::post('/save.alphabet', [BackendAdminController::class, 'enregistre_alphabet'])->name("save.alphabet");
Route::put('/update.alpha/{alphabet}', [BackendAdminController::class, 'update_alphabet'])->name("update.alpha");
Route::delete('/delete.alpha/{alphabet}', [BackendAdminController::class, 'delete_alphabet'])->name("delete.alpha");

//AJOUT CANAL DE RENCONTRE AVEC ALLO SERVICE
Route::get('/ajout.rencontre', [BackendAdminController::class, 'ajout_canal_rencontre'])->name("ajout.rencontre");
Route::post('/store.canal', [BackendAdminController::class, 'save_canal_rencontre'])->name("store.canal");
Route::put('/update.canal/{canal}', [BackendAdminController::class, 'updatecanal'])->name("update.canal");
Route::delete('/delete.canal/{id}', [BackendAdminController::class, 'delete_canal'])->name("delete.canal");

//AJOUT DE DISPONIBILITE
Route::get('/ajout.disponibilite', [BackendAdminController::class, 'add_dispo'])->name("ajout.disponibilite");
Route::post('/save.dispo', [BackendAdminController::class, 'save_dispo'])->name("save.dispo");
Route::put('/update.disponibilite/{dispo}', [BackendAdminController::class, 'update_dispo'])->name("update.disponibilite");
Route::delete('/delete.dispo/{id}', [BackendAdminController::class, 'delete_dispo'])->name("delete.dispo");

//NATURE PIECES
Route::get('/nature.piece', [BackendAdminController::class, 'nature_piece'])->name("nature.piece");
Route::post('/store.pieces', [BackendAdminController::class, 'save_nature_piece'])->name("store.pieces");
Route::put('/update.piece/{naturepiece}', [BackendAdminController::class, 'update_piece'])->name("update.piece");
Route::delete('/delete.naturepiece/{id}', [BackendAdminController::class, 'delete_nature_piece'])->name("delete.naturepiece");

//AJOUT COMMUNE
Route::get('/communes', [BackendAdminController::class, 'list_commune'])->name("ajout.commune");
Route::post('/store.commune', [BackendAdminController::class, 'save_commune'])->name("store.commune");
Route::put('/update.commune/{comm}', [BackendAdminController::class, 'update_commune'])->name("update.commune");
Route::delete('/delete.commune/{id}', [BackendAdminController::class, 'delete_commune'])->name("delete.commune");

//AJOUT DOMAINE
Route::get('/ajout/quartier', [BackendAdminController::class, 'add_quartier'])->name("ajout/quartier");
Route::post('/store.quartier', [BackendAdminController::class, 'save_quartier'])->name("store.quartier");
Route::put('/update.quartier/{quartier}', [BackendAdminController::class, 'update_tiek'])->name("update.quartier");
Route::delete('/destroy.quartier/{id}', [BackendAdminController::class, 'destroy'])->name("destroy.quartier");

//ABOUT
Route::get('/ajout.about', [AboutController::class, 'presentation'])->name("ajout.about");
Route::post('/save.about', [AboutController::class, 'store'])->name("save.about");
Route::put('/about.update/{about}', [AboutController::class, 'update'])->name("about.update");
Route::delete('/delete.about/{about}', [AboutController::class, 'destroy_about'])->name("delete.about");

//ASSISTANCE
Route::get('/ajout.assistance', [AssistanceController::class, 'add_assist'])->name("ajout.assistance");
Route::post('/save.assistance', [AssistanceController::class, 'store_assistance'])->name("save.assistance");
Route::put('/update.assistance/{assistance}', [AssistanceController::class, 'update'])->name("update.assistance");
Route::delete('/delete.assistance/{assistance}', [AssistanceController::class, 'delete_assistance'])->name("delete.assistance");

//DOMAINE ACTIVITY
Route::get('/activity.domaine', [DomaineController::class, 'add_domaine'])->name("activity.domaine");
Route::post('/save_domaine_activity', [DomaineController::class, 'store_domaine'])->name("save_domaine_activity");
Route::put('update.domaine/{domaine}', [DomaineController::class, 'update_domaine_activity'])->name("update.domaine");
Route::delete('delete.domaine/{id}',[DomaineController::class, 'destroy_activity_domaine'])->name("delete.domaine");

//MESSAGE CONTACTS
Route::get('/message/contact', [ContactController::class, 'message_contact'])->name("message/contact");
Route::delete('/delete.messagecontact/{id}', [ContactController::class, 'destroy_message_contact'])->name("delete.messagecontact");

//LISTE TEMOIGNAGES
Route::get('/liste.temoignages', [TemoignageController::class, 'show_temoignage'])->name("liste.temoignages");
Route::post('/save.temoignage', [TemoignageController::class, 'save_temoignage'])->name("save.temoignage");
Route::get('/statut', [TemoignageController::class, 'etat'])->name("statut");
Route::post('/save.statut', [TemoignageController::class, 'store_statut'])->name("save.statut");
Route::put('update.temoignage/{temoignage}', [TemoignageController::class, 'update_temoignage'])->name("update.temoignage");
Route::delete('delete.temoignage/{id}', [TemoignageController::class, 'destroy_temoignage'])->name("delete.temoignage");

