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

Route::get('/', function () {
    return view('welcome');
});

// route untuk home controller
Route::get('home', [HomeController::class,'index'])->name('home');

// route untuk profile controller
Route::get('profile', ProfileController::class,'index')->name('profile');

// route untuk employee controller
Route::resource('employees', EmployeeController::class);
