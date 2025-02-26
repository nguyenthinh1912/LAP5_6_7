<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserController;
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


Route::get('/',[MovieController::class,'index'])->name('movie');
Route::get('/delete/{id}',[MovieController::class,'destroy'])->name('delete_movie');
Route::get('/add', [MovieController::class, 'create'])->name('add_movie');
Route::post('/add', [MovieController::class, 'store']);
Route::get('/update/{id}', [MovieController::class, 'edit'])->name('edit_movie');
Route::put('/update/{id}', [MovieController::class, 'update'])->name('update_movie');
Route::match(['GET', 'POST'], '/register', [AuthController::class, 'register'])->name('register');
Route::match(['GET', 'POST'], '/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/profile', [AuthController::class, 'profile'])->name('profile')->middleware('auth');
Route::match(['GET', 'POST'], '/update_profile', [AuthController::class, 'update_Profile'])->name('update_profile')->middleware('auth');
Route::prefix('admin')->middleware('checkrole')->group(function () {
    Route::get('/', [UserController::class, 'index'])->name('admin');
    Route::post('/user/{id}', [UserController::class, 'active'])->name('active');

});
