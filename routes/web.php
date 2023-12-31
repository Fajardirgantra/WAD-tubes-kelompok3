<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;

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

/*Route::get('/ ', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');*/

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/user/index', [UserController::class, 'index'])->name('user_index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user_create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user_store');
    Route::get('/user/edit/{id_user}', [UserController::class, 'edit'])->name('user_edit');
    Route::post('/user/update/{id_user}', [UserController::class, 'update'])->name('user_update');
    Route::get('/user/destroy/{id_user}', [UserController::class, 'destroy'])->name('user_destroy');
});

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
