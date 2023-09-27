<?php

use App\Http\Controllers\AnnouncementController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\RevisorController;

// rotte pubbliche
Route::get('/',[PublicController::class, 'home'])->name('welcome');
Route::get('/announcement/show/{announcement}',[PublicController::class, 'show'])->name('announcement.show');
Route::get('/announcement/index', [AnnouncementController::class, 'index'])->name('announcement.index');
Route::get('/announcement/bycategory/{category}',[PublicController::class, 'bycategory'])->name('announcement.bycategory');
Route::get('ricerca/annuncio',[PublicController::class,'searchAnnouncements'])->name('announcements.search');
Route::post('/lingua/{lang}', [PublicController::class, 'setLanguage'])->name('set_language_locale');

// rotte private
Route::middleware(['auth'])->group(function(){
    Route::get('/announcement/create',[AnnouncementController::class,'create'])->name('announcement.create');
    Route::get('/richiesta/revisore/{user}', [RevisorController::class, 'becomeRevisor'])->name('become.revisor');
    Route::get('/form/revisore', [RevisorController::class, 'formRevisor'])->name('form.revisor');
});


// rotte revisor
Route::middleware(['isRevisor'])->group(function(){
    Route::get('/revisor/home', [RevisorController::class, 'index'])->name('revisor.index');
    Route::patch('/accetta/annuncio/{announcement}',[RevisorController::class, 'acceptAnnouncement'])->name('revisor.accept_announcement');
    Route::patch('/rifiuta/annuncio/{announcement}',[RevisorController::class, 'rejectAnnouncement'])->name('revisor.reject_announcement');
    Route::patch('/anulla/annuncio',[RevisorController::class, 'annulAnnouncement'])->name('revisor.annul_announcement');
});

// rotta amministratore
Route::get('/rendi/revisore/{user}', [RevisorController::class, 'makeRevisor'])->name('make.revisor');
