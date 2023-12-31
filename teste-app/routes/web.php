<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::controller(App\Http\Controllers\EmpresaController::class)->group(function () {
    Route::get('/empresas', 'index');
    Route::get('/add-empresa', 'create');
    Route::post('/add-empresa', 'store');
    Route::get('/edit-empresa/{empresa_id}', 'edit');
    Route::put('/update-empresa/{empresa_id}', 'update');
    Route::delete('/delete-empresa/{empresa_id}', 'destroy');
});