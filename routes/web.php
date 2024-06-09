<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\formController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SuratController;
use App\Http\Middleware\CheckGuest;
use App\Http\Middleware\CheckLogin;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/form',[formController::class,'index']);
Route::post('/post/form',[formController::class,'submitForm']);

Route::get('/admin',[DashboardController::class,'index'])->middleware(CheckLogin::class)->name('dash');
Route::post('/admin',[DashboardController::class,'searchData'])->middleware(CheckLogin::class)->name('dash');

Route::get('/login', function () {
    return view('login');
})->middleware(CheckGuest::class)->name('login');

Route::post('/login',[LoginController::class, 'login']);
Route::get('/logout',[LoginController::class, 'logout'])->middleware(CheckLogin::class);

// Route::get('/form', [SuratController::class, 'showForm'])->name('showForm');
Route::post('/unduh', [SuratController::class, 'unduhSurat'])->middleware(CheckLogin::class)->name('unduhSurat');
Route::post('/export-excel', [ExcelController::class,'exportAll'])->middleware(CheckLogin::class);
