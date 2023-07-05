<?php

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


require __DIR__ . '/auth.php';
