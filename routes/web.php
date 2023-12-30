<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\PemeliharaanController;


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

    Route::get('/asset/index', [AssetController::class, 'index'])->name('asset_index');

    Route::get('/asset/index', [AssetController::class, 'index'])->name('asset_index');
    Route::get('/asset/create', [AssetController::class, 'create'])->name('asset_create');
    Route::post('/asset/store', [AssetController::class, 'store'])->name('asset_store');
    Route::get('/asset/edit/{id_asset}', [AssetController::class, 'edit'])->name('asset_edit');
    Route::post('/asset/update/{id_asset}', [AssetController::class, 'update'])->name('asset_update');
    Route::get('/asset/destroy/{id_asset}', [AssetController::class, 'destroy'])->name('asset_destroy');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
});

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/pemeliharaan/index', [PemeliharaanController::class, 'index'])->name('pemeliharaan_index');
    Route::get('/pemeliharaan/create', [PemeliharaanController::class, 'create'])->name('pemeliharaan_create');
    Route::post('/pemeliharaan/store', [PemeliharaanController::class, 'store'])->name('pemeliharaan_store');
    Route::get('/pemeliharaan/edit/{id_pemeliharaan}', [PemeliharaanController::class, 'edit'])->name('pemeliharaan_edit');
    Route::post('/pemeliharaan/update/{id_pemeliharaan}', [PemeliharaanController::class, 'update'])->name('pemeliharaan_update');
    Route::get('/pemeliharaan/destroy/{id_pemeliharaan}', [PemeliharaanController::class, 'destroy'])->name('pemeliharaan_destroy');


});



require __DIR__ . '/auth.php';

