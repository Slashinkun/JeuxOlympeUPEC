<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

use App\Http\Middleware\Auth;


//Route de l'accueil
Route::get('/', function () {
    return view('home');
})->name('accueil');



//Route pour login des admins
Route::get('/create_login',[AdminController::class, 'createForm'])->name('auth.createLogin');
Route::post('/create_login',[AdminController::class, 'create']);

Route::get('admin/login', [AuthController::class, 'login'])->name('auth.login');
Route::post('admin/login',[AuthController::class, 'doLogin']);

Route::get('admin/compte',[AdminController::class,'account'])->name('auth.compte')->middleware(Auth::class);
Route::delete('/logout',[AuthController::class, 'logout'])->name('auth.logout');


//Routes pour les actions des clients
//Route::get('home_client', [MyController::class, 'accueilClient'])->name('accueil.clients');
Route::get('calendrier',[MyController::class, 'afficheCalendrier'])->name('client.calendrier');
Route::post('calendrier',[MyController::class,'chercherSport'])->name('client.cherchersport');
Route::get('billetterie',[MyController::class, 'billetterie'])->name('client.billetterie');
Route::post('billetterie',[MyController::class,'chercherprix'])->name('client.chercherprix');
Route::post('fin_achat',[MyController::class, 'acheter'])->name('client.achat');


//Route pour les actions des admins
Route::get('admin/admin_addlieu',[AdminController::class, 'formAdminLieu'])->name("admin.lieu")->middleware(Auth::class);;
Route::post('admin/admin_addlieu',[AdminController::class,'ajouterLieu'])->name("admin.addlieu");

Route::get('admin/admin_addsport',[AdminController::class, 'formAdminSport'])->name('admin.sport')->middleware(Auth::class);
Route::post('admin/admin_addsport',[AdminController::class,'ajouterSport'])->name("admin.addsport");

//Route::get('admin/admin_delsport',[AdminController::class,'formDelSport'])->name("admin.delformsport");

//Route::get('admin/admin_delsport',[AdminController::class,'formDelLieu'])->name('admin.delformlieu');

Route::get('admin/admin_addcomp',[AdminController::class, 'formAdminComp'])->name('admin.comp')->middleware(Auth::class);
Route::post('admin/admin_addcomp',[AdminController::class,'ajouterComp'])->name("admin.addcomp");

Route::get('admin/admin_majcomp',[AdminController::class, 'formAdminMajComp'])->name('admin.majcomp')->middleware(Auth::class);
Route::post('admin./admin_majcomp',[AdminController::class, 'majComp'])->name('admin.mjcomp');

Route::get('admin/admin_delcomp',[AdminController::class, 'formDelComp'])->name('admin.delcomp')->middleware(Auth::class);
Route::post('admin/admin_delcomp',[AdminController::class, 'delComp'])->name('admin.compdel');



Route::get('admin/admin_voirachat', [AdminController::class, 'voirReservation'])->name('admin.voirachat')->middleware(Auth::class);
Route::get('admin/admin_voirplace', [AdminController::class, 'voirNBSpectateur'])->name('admin.voirplace')->middleware(Auth::class);
Route::get('admin/admin_voirplacerestant', [AdminController::class ,'voirPlaceRestant'])->name('admin.voirplacerestant')->middleware(Auth::class);



Route::get('test',function(){
    return view('test');
});