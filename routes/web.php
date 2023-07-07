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

Route::get('/', [PostsController::class, 'welcome'])->name('welcome');

Route::get('/index', [PostsController::class, 'index'])->name('index');
Route::get('/login', [Usercontroller::class, 'login'])->name('login');
Route::post('/login', [Usercontroller::class, 'authenticate'])->name('authenticate');
Route::get('/deconnexion', [Usercontroller::class, 'deconnexion'])->name('deconnexion');
Route::get('/register', [Usercontroller::class, 'register'])->name('register');
Route::get('/edit', [Usercontroller::class, 'edit'])->name('user.edit');
Route::put('/edit', [Usercontroller::class, 'update'])->name('user.update');
Route::post('/register', [Usercontroller::class, 'create'])->name('create');



// route pour les comments

// Route::get('/welcome', [CommentsController::class, 'index'])
//     ->middleware(['auth', 'verified'])
//     ->name('welcome.index');

Route::get('/welcome', [CommentsController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('comments.create');

Route::post('/welcome', [CommentsController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('comments.store');

Route::get('/welcome', [CommentsController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('show');

// Route::delete('/welcome', [CommentsController::class, 'destroy'])
//     ->middleware(['auth', 'verified'])
//     ->name('destroy');


// Routes pour les posts
Route::middleware('auth')->group(function () {
    Route::get('/posts/create', [PostsController::class, 'create'])->name('posts.create');
    Route::post('/posts', [PostsController::class, 'store'])->name('posts.store');
    Route::get('/posts/edit/{id}', [PostsController::class, 'edit'])->name('posts.edit');
    Route::put('/posts/{id}', [PostsController::class, 'update'])->name('posts.update');
    Route::delete('/posts/{post}', [PostsController::class, 'destroy'])->name('posts.destroy');
});

// Route Fallback pour la 404
Route::fallback(function () {
    return view('404');
});


// Routes pour les likes 

Route::middleware('auth')->group(function () {
    Route::get('/likes/create', [LikeController::class, 'create'])->name('likes.create');
    Route::post('/likes', [LikeController::class, 'store'])->name('likes.store');
    Route::delete('/likes/{like}', [LikeController::class, 'destroy'])->name('likes.destroy');
});
