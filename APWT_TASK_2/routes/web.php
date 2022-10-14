<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\ServicesController;

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
    return view('home');
})->name('home');

Route::get('/login',[PagesController::class, 'login'])->name('login');
Route::post('/login',[PagesController::class, 'loginSubmit'])->name('loginSubmit');

Route::get('/registration',[PagesController::class, 'register'])->name('register');
Route::post('/registration',[PagesController::class, 'registerSubmit'])->name('registerSubmit');

Route::get('/contact',[PagesController::class, 'contact'])->name('contact');
