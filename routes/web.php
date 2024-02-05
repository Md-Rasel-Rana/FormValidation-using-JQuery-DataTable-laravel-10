<?php

use App\Http\Controllers\UserRegistration;
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

Route::get('/', [UserRegistration::class, 'UserRegistration']);
Route::post('/user-registration', [UserRegistration::class, 'UserRegistrationStore'])->name('user-registration');
Route::get('/user-page', [UserRegistration::class, 'Userinfopage'])->name('user-lnfo');
Route::get('/get-user',[UserRegistration::class, 'GetUser'])->name('get-user');

