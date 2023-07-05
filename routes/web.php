<?php

use App\Http\Controllers\Usercontroller;
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

Route::get('/login', [Usercontroller::class,'login'])->name('login');
Route::post('/login', [Usercontroller::class,'authenticate'])->name('authenticate');
Route::get('/register', [Usercontroller::class,'register'])->name('register');
Route::post('/register', [Usercontroller::class,'create'])->name('create');

