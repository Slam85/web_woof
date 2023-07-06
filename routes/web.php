<?php

use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\PostsController;
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

Route::get('/index', [PostsController::class, 'index'])->name('index');
Route::get('/login', [Usercontroller::class, 'login'])->name('login');
Route::post('/login', [Usercontroller::class, 'authenticate'])->name('authenticate');
Route::get('/deconnexion', [Usercontroller::class, 'deconnexion'])->name('deconnexion');
Route::get('/register', [Usercontroller::class, 'register'])->name('register');
Route::get('/edit', [Usercontroller::class, 'edit'])->name('user.edit');
Route::put('/edit/{id}', [Usercontroller::class, 'update'])->name('user.update');
Route::post('/register', [Usercontroller::class, 'create'])->name('create');



// route pour les comments
Route::get('/welcome}', [CommentsController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('welcome.create');

Route::post('/welcome}', [CommentsController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('store');

Route::get('/welcome', [CommentsController::class, 'edit'])
    ->middleware(['auth', 'verified'])
    ->name('edit');

Route::put('/welcome', [CommentsController::class, 'update'])
    ->middleware(['auth', 'verified'])
    ->name('update');

Route::delete('/welcome', [CommentsController::class, 'destroy'])
    ->middleware(['auth', 'verified'])
    ->name('destroy');


// Routes pour les posts
Route::middleware('auth')->group(function () {
    Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
    Route::get('/posts/edit/{id}', [PostsController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [PostsController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{id}', [PostsController::class, 'destroy'])->name('posts.destroy');
});
