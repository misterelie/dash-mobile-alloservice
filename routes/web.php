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


//SECTION ADMINISTRATION
Route::get('/administration', [AdminController::class, 'index'])->name("admin.dashboard");

