<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EmployeeController;

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
// route awal
Route::get('/', function () { return view('welcome');});

// route home
Route::get('home', [HomeController::class, 'index'])->name('home');

// route home
Route::get('profile', ProfileController::class)->name('profile');

// route home
Route::resource('employees', EmployeeController::class);
