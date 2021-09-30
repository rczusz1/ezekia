<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', [App\Http\Controllers\EzekiaUsersController::class, 'home'])->name('home');
Route::get('/users', [App\Http\Controllers\EzekiaUsersController::class, 'getAllEzekiaUsers'])->name('getAllEzekiaUsers');
Route::get('/get-user/{user_id}', [App\Http\Controllers\EzekiaUsersController::class, 'getUser'])->name('getUser');
Route::get('/get-user/{user_id}/{currency_to}', [App\Http\Controllers\EzekiaUsersController::class, 'getUserWitHourlyRatesConverted'])->name('getUserWitHourlyRatesConverted');

## Create Ezekia User
Route::get('/user/create/{link}', [App\Http\Controllers\EzekiaUsersController::class, 'createUser'])->name('createUser');
Route::post('/user/store', [App\Http\Controllers\EzekiaUsersController::class, 'storeUser'])->name('storeUser');

## convert currency

//Route::get('/currency-convert', [App\Http\Controllers\EzekiaUsersController::class, 'convert'])->name('convert');
Route::get('/currency-convert/{currency_from}/{currency_to}/{amount}', [App\Http\Controllers\EzekiaUsersController::class, 'convert'])->name('convert');

