<?php

use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\ProfileController;
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
Route::get('/deconnexion',[Usercontroller::class,'deconnexion'])->name('deconnexion');
Route::get('/register', [Usercontroller::class,'register'])->name('register');
Route::post('/register', [Usercontroller::class,'create'])->name('create');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/createpost}', [PostsController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('create');

Route::post('/createpost}', [PostsController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('store');

Route::get('/editpost/{id}', [PostsController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('edit');

Route::put('/editpost/{id}', [PostsController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('update');

Route::delete('/delete/{id}', [PostsController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('destroy');

    

