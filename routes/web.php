<?php

use Illuminate\Support\Facades\Route;

//all controller
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\{RegisterController, LoginController, LogoutController};
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostLikeController;
use App\Http\Controllers\UserPostController;

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
Route::get('/', function (){
    return view('home');
})->name('home');


//authentication
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);
Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//route model binding
Route::get('/user/{user:username}/posts', [UserPostController::class, 'index'])->name('users.posts');

Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::post('/posts', [PostController::class, 'store']);
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

Route::post('/posts/{post}/likes', [PostLikeController::class, 'like'])->name('posts.likes');
Route::delete('/posts/{post}/unlike', [PostLikeController::class, 'unlike'])->name('posts.unlike');

//Route::get('/', function () {
//    return view('welcome');
//});
