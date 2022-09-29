<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;



Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/product',[PagesController::class, 'product'])->name('product');
Route::get('/about_us',[PagesController::class, 'about_us'])->name('about_us');
Route::get('/ourteam',[PagesController::class, 'ourteam'])->name('ourteam');
Route::get('/contact_us',[PagesController::class, 'contact_us'])->name('contact_us');