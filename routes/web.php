<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RuanganController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\PemeliharaanController;
use App\Http\Controllers\ComplainController;

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
    return view('welcome2');
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

    Route::get('/ruangan/index', [RuanganController::class, 'index'])->name('ruangan_index');
    Route::get('/ruangan/create', [RuanganController::class, 'create'])->name('ruangan_create');
    Route::post('/ruangan/store', [RuanganController::class, 'store'])->name('ruangan_store');
    Route::get('/ruangan/edit/{id_ruangan}', [RuanganController::class, 'edit'])->name('ruangan_edit');
    Route::post('/ruangan/update/{id_ruangan}', [RuanganController::class, 'update'])->name('ruangan_update');
    Route::get('/ruangan/destroy/{id_ruangan}', [RuanganController::class, 'destroy'])->name('ruangan_destroy');
    Route::get('/ruangan/show/{id_ruangan}', [RuanganController::class, 'show'])->name('ruangan_show');

    Route::get('/asset/index', [AssetController::class, 'index'])->name('asset_index');
    Route::get('/asset/create', [AssetController::class, 'create'])->name('asset_create');
    Route::post('/asset/store', [AssetController::class, 'store'])->name('asset_store');
    Route::get('/asset/edit/{id_asset}', [AssetController::class, 'edit'])->name('asset_edit');
    Route::post('/asset/update/{id_asset}', [AssetController::class, 'update'])->name('asset_update');
    Route::get('/asset/destroy/{id_asset}', [AssetController::class, 'destroy'])->name('asset_destroy');

    Route::get('/pemeliharaan/index', [PemeliharaanController::class, 'index'])->name('pemeliharaan_index');
    Route::get('/pemeliharaan/create', [PemeliharaanController::class, 'create'])->name('pemeliharaan_create');
    Route::post('/pemeliharaan/store', [PemeliharaanController::class, 'store'])->name('pemeliharaan_store');
    Route::get('/pemeliharaan/edit/{id_pemeliharaan}', [PemeliharaanController::class, 'edit'])->name('pemeliharaan_edit');
    Route::post('/pemeliharaan/update/{id_pemeliharaan}', [PemeliharaanController::class, 'update'])->name('pemeliharaan_update');
    Route::get('/pemeliharaan/destroy/{id_pemeliharaan}', [PemeliharaanController::class, 'destroy'])->name('pemeliharaan_destroy');

    Route::get('/complain/index', [ComplainController::class, 'index'])->name('complain_index');
    Route::get('/complain/edit/{id_complain}', [ComplainController::class, 'edit'])->name('complain_edit');
    Route::post('/complain/update/{id_complain}', [ComplainController::class, 'update'])->name('complain_update');
    Route::get('/complain/destroy/{id_complain}', [ComplainController::class, 'destroy'])->name('complain_destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/complain/create', [ComplainController::class, 'create'])->name('complain_create');
    Route::post('/complain/store', [ComplainController::class, 'store'])->name('complain_store');
    
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
