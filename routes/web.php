<?php

use App\Http\Controllers\AcaraController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SoalController;
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

Route::get('/',[UserController::class, 'indexLp'])->name('indexLp');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/angket', [AcaraController::class, 'angketIndex'])->name('angket.index');
Route::get('/angket/{acaraId}', [JawabanController::class, 'angketForm'])->name('angket.form');
// Route::get('/Admin', function () {
//     return view('Admin.Dashboard');
// })->middleware(['auth', 'verified'])->name('admin.dashboard');

Route::get('/Tables', function () {
    return view('Admin.table');
})->middleware(['auth', 'verified'])->name('table');

Route::middleware('auth')->group(function () {

    // Route::get('/user', [ProfileController::class, 'index'])->name('profile.index');
    // Route::get('/users/create', [ProfileController::class, 'create'])->name('users.create');
    // Route::post('/users', [ProfileController::class, 'store'])->name('users.store');
    // Route::delete('/users/{user}', [ProfileController::class, 'destroyUser'])->name('users.destroy');
    // Route::get('/users/{user}/edit', [ProfileController::class, 'editUser'])->name('users.edit');
    // Route::put('/users/{user}', [ProfileController::class, 'updateUser'])->name('users.update');

    // Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/table', [AcaraController::class, 'index'])->name('table');
    // Route::get('/createAcara', [AcaraController::class, 'create'])->name('acaraCreate');
    Route::post('/createAcara', [AcaraController::class, 'store'])->name('acaraStore');
    Route::get('acaras/{acara}', [AcaraController::class, 'show'])->name('acaras.show');

    Route::get('/tableSoal', [SoalController::class, 'index'])->name('tableSoal');
    Route::get('/soals/{soal}/edit', [SoalController::class, 'edit'])->name('soals.edit');
    Route::put('/soals/{soal}', [SoalController::class, 'update'])->name('soals.update');
    Route::get('soals/create', [SoalController::class, 'create'])->name('soals.create');
    Route::post('/createSoal', [SoalController::class, 'store'])->name('soalStore');

    Route::get('/table/{id}/create-soal', [AcaraController::class, 'acaraCreateSoal'])->name('AcaraCreateSoal');

    Route::resource('acaras', AcaraController::class);
    Route::resource('soals', SoalController::class);
    Route::resource('angkets', JawabanController::class);
    Route::get('acaras/{acara}/create-soal', [SoalController::class, 'create'])->name('soals.create-soal');

    



    // Route Admin Dashboard
    Route::get('/admin-dashboard', function () {
        return view('Admin.dashboard.dashboard-index');
    })->name('admin.dashboard');

    // Route Admin Acara
    Route::get('/admin-acara', [AcaraController::class, 'index'])->name('admin.acara');
    Route::get('/admin-acara/tambah', [AcaraController::class, 'create'])->name('admin.acara-create');
    Route::post('/admin-acara/store', [AcaraController::class, 'store'])->name('admin.acara-store');
    Route::get('/admin-acara/{id}/edit', [AcaraController::class, 'edit'])->name('admin.acara-edit');
    Route::put('/admin-acara/{id}', [AcaraController::class, 'update'])->name('admin.acara-update');

    // Route Admin Soal
    Route::get('/admin-soal/{id}/soal', [AcaraController::class, 'soal'])->name('admin.acara-soal');
    Route::get('/admin-soal/{slug}/acara', [SoalController::class, 'soalAcara'])->name('admin.soal');
    Route::post('/admin-soal/store', [SoalController::class, 'store'])->name('admin.soal-store');
    Route::get('/admin-soal/{id}/edit', [SoalController::class, 'edit'])->name('admin.soal-edit');
    Route::put('/admin-soal/{id}', [SoalController::class, 'update'])->name('admin.soal-update');

    // Route Admin Role
    Route::resource('admin-roles', RoleController::class);
    Route::get('/admin-roles/{slug}/acara', [RoleController::class, 'roleAcara'])->name('admin.role-acara');
    Route::get('/admin-roles/{id}/tambah', [RoleController::class, 'roleTambah'])->name('admin.role-tambah');

    // Route Admin User
    Route::resource('admin-user', UserController::class);

});

require __DIR__.'/auth.php';
