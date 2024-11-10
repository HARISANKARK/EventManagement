<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/events',EventController::class);
Route::get('/registrations/event_requests/{id?}', [RegistrationController::class, 'ShowEvents'])->name('registrations.event_requests');
Route::get('/registrations/create/{id?}', [RegistrationController::class, 'create'])->name('registrations.create');
Route::resource('/registrations',RegistrationController::class)->except('create');
