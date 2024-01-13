<?php

use App\Http\Controllers\AcaraController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SoalController;
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
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/Admin', function () {
    return view('Admin.Dashboard');
})->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::get('/Tables', function () {
    return view('Admin.table');
})->middleware(['auth', 'verified'])->name('table');

Route::middleware('auth')->group(function () {

    Route::get('/user', [ProfileController::class, 'index'])->name('profile.index');
    Route::get('/users/create', [ProfileController::class, 'create'])->name('users.create');
    Route::post('/users', [ProfileController::class, 'store'])->name('users.store');
    Route::delete('/users/{user}', [ProfileController::class, 'destroyUser'])->name('users.destroy');
    Route::get('/users/{user}/edit', [ProfileController::class, 'editUser'])->name('users.edit');
    Route::put('/users/{user}', [ProfileController::class, 'updateUser'])->name('users.update');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/table', [AcaraController::class, 'index'])->name('table');
    Route::get('/createAcara', [AcaraController::class, 'create'])->name('acaraCreate');
    Route::post('/createAcara', [AcaraController::class, 'store'])->name('acaraStore');
    Route::get('acaras/{acara}', [AcaraController::class, 'show'])->name('acaras.show');

    Route::get('/tableSoal', [SoalController::class, 'index'])->name('tableSoal');
    Route::get('/soals/{soal}/edit', [SoalController::class, 'edit'])->name('soals.edit');
    Route::put('/soals/{soal}', [SoalController::class, 'update'])->name('soals.update');
    Route::get('soals/create', [SoalController::class, 'create'])->name('soals.create');
    Route::post('/createSoal', [SoalController::class, 'store'])->name('soalStore');

    Route::resource('acaras', AcaraController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('soals', SoalController::class);
    Route::get('acaras/{acara}/create-soal', [SoalController::class, 'create'])->name('soals.create-soal');
});

require __DIR__.'/auth.php';
