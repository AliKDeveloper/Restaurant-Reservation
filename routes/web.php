<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// My Controller
use App\Http\Controllers\TableController;
use App\Http\Controllers\LanguageController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//Profile Routes
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Table Routes
Route::middleware(['auth', 'verified'])->group(function(){
    Route::resource('/table', TableController::class);
    Route::patch('table/cancel/{id}', [TableController::class,'cancel'])->name('table.cancel');
    Route::patch('table/cancel/all/{message}', [TableController::class,'cancelAll'])->name('table.cancelAll');
    Route::post('table/add/tables', [TableController::class,'addTables'])->name('table.addTables');
});

//Localization
Route::get('lang/check', [LanguageController::class, 'check'])->name('lang.check');
Route::get('lang/{locale}', [LanguageController::class, 'change'])->name('lang.change');

Route::view('tt','table.parts.addTables');
Route::redirect('/','table');
require __DIR__.'/auth.php';
