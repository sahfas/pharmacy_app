<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DrugController;
use App\Http\Controllers\PrescriptionController;
use App\Http\Controllers\ProfileController;

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

Route::get('/home', function () {
    return view('home');
})->middleware(['auth', 'verified'])->name('home');
Route::get('/quotations', function () {
    return view('quotations');
})->middleware(['auth', 'verified'])->name('quotations');

Route::get('/dashboard', [DrugController::class, 'dashboard'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/drugs.add', [DrugController::class, 'index'])->middleware(['auth', 'verified'])->name('drugs.add');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('drugs', DrugController::class)->only(['index', 'store', 'show']);
Route::resource('prescriptions', PrescriptionController::class)->only(['store']);

require __DIR__.'/auth.php';
