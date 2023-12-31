<?php

use App\Http\Controllers\LikeController;
use App\Http\Controllers\Usercontroller;
use App\Http\Controllers\CommentsController;
use App\Http\Controllers\CommentLikeController;
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
Route::get('/edit', [Usercontroller::class, 'edit']) ->middleware(['auth', 'verified'])->name('user.edit');
Route::put('/edit', [Usercontroller::class, 'update']) ->middleware(['auth', 'verified'])->name('user.update');
Route::delete('/edit/{edit}', [Usercontroller::class, 'destroy']) ->middleware(['auth', 'verified'])->name('user.delete');
Route::post('/register', [Usercontroller::class, 'create'])->name('create');



// route pour les comments

// Route::get('/welcome', [CommentsController::class, 'index'])
//     ->middleware(['auth', 'verified'])
//     ->name('welcome.index');

Route::get('/welcome', [CommentsController::class, 'create'])
    ->middleware(['auth', 'verified'])
    ->name('comments.create');

Route::post('/welcome/{post_id}', [CommentsController::class, 'store'])
    ->middleware(['auth', 'verified'])
    ->name('comments.store');

Route::get('/welcome', [CommentsController::class, 'show'])
    ->middleware(['auth', 'verified'])
    ->name('show');

Route::delete('/comments/{comment}', [CommentsController::class, 'destroy'])->name('comment.destroy');



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
    Route::get('/likes/{id}', [LikeController::class, 'toggle'])->name('likes.create');
    Route::delete('/likes/{id}', [LikeController::class, 'destroy'])->name('likes.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/likesComment/{id}', [CommentLikeController::class, 'toggleComments'])->name('likesComment.create');
    Route::delete('/likesComment/{id}', [CommentLikeController::class, 'destroy'])->name('likesComment.destroy');
});