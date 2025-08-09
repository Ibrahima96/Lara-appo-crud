<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ProduitController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/debug', function () {
    return view('debug-welcome');
});

Route::get('/home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Routes pour les clients
    Route::resource('clients', ClientController::class);
    
    // Routes pour les produits
    Route::resource('produits', ProduitController::class);
    
    // Routes pour les commandes
    Route::resource('commandes', CommandeController::class);
});

require __DIR__.'/auth.php';
