<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ServicesController;
use App\Http\Middleware\ValidateLogin;
use App\Http\Middleware\ValidAdmin;

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

Route::get('/aboutUs',[PagesController::class, 'aboutUs'])->name('aboutUs');

Route::get('/contactUs',[PagesController::class, 'contactUs'])->name('contactUs');

Route::get('/ourTeams',[PagesController::class, 'ourTeams'])->name('ourTeams');

Route::get('/login',[PagesController::class, 'login'])->name('login');
Route::post('/login',[PagesController::class, 'loginSubmit'])->name('loginSubmit');
Route::get('/logout',[PagesController::class, 'logout'])->name('logout');

Route::get('/registration',[PagesController::class, 'register'])->name('register');
Route::post('/registration',[PagesController::class, 'registerSubmit'])->name('registerSubmit');

Route::get('/admin/dashboard',[AdminController::class, 'aDashboard'])->name('aDashboard')->middleware('ValidAdmin');

Route::get('/user/dashboard',[UserController::class, 'uDashboard'])->name('uDashboard')->middleware('ValidateLogin');
Route::post('/user/dashboard',[UserController::class, 'uDashboardSubmit'])->name('uDashboardSubmit')->middleware('ValidateLogin');

Route::get('/user/userEdit/{id}',[UserController::class, 'userEditId'])->name('userEditId')->middleware('ValidAdmin');
Route::get('/user/userEdit',[UserController::class, 'userEdit'])->name('userEdit')->middleware('ValidAdmin');
Route::post('/user/userEdit',[UserController::class, 'userEditSubmit'])->name('userEditSubmit')->middleware('ValidAdmin');

Route::get('/admin/userDelete/{id}',[UserController::class, 'userDelete'])->name('userDelete')->middleware('ValidAdmin');
