<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('verify-account', [App\Http\Controllers\HomeController::class, 'verifyaccount'])->name('verifyAccount');
Route::post('verifyotp', [App\Http\Controllers\HomeController::class, 'useractivation'])->name('verifyotp');

// profile add here

Route::get('add-profile', [App\Http\Controllers\AddProfileController::class, 'index'])->name('profile');
Route::post('add-profiles', [App\Http\Controllers\AddProfileController::class, 'store'])->name('profile_add');
Route::get('add-profiles/{id}/edit', [App\Http\Controllers\AddProfileController::class, 'edit'])->name('profile_edit');
Route::post('update-profile', [App\Http\Controllers\AddProfileController::class, 'update'])->name('profile_update');






