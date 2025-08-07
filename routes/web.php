<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\CommandeController;
use App\Http\Controllers\ProduitController;
use Illuminate\Support\Facades\Route;

Route::get('/',[ClientController::class,'index'])->name('index');

Route::resource('clients', ClientController::class);

Route::resource('produits', ProduitController::class);
Route::resource('commandes', CommandeController::class);



