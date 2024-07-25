<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ServiceController;


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









// admin
Route::get('/',[AdminController::class,'index'])->name('index');
Route::get('/signup',[AdminController::class,'signup'])->name('signup');

Route::post('/store_signup',[AdminController::class,'store_signup'])->name('store_signup');


Route::get('dashboard',[AdminController::class,'dashboard'])->name('dashboard');
Route::post('/login',[AdminController::class,'login'])->name('login');

Route::post('/logout', [AdminController::class, 'logout'])->name('logout');
