<?php

use App\Http\Controllers\TypeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExpensionController;

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
    return redirect(route("expenses.index"));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/summary', [ExpensionController::class, 'index'])->name('expenses.index')->middleware('auth');

Route::get('/addExpanses', [ExpensionController::class, 'create'])->name('expenses.create')->middleware('auth');
Route::post('/addExpanses', [ExpensionController::class, 'store'])->name('expenses.store')->middleware('auth');

Route::get('/edit/{expension}', [ExpensionController::class, 'edit'])->name('expenses.edit')->middleware('auth');
Route::post('/edit/{expension}', [ExpensionController::class, 'update'])->name('expenses.update')->middleware('auth');
Route::delete('/delete/{expension}', [ExpensionController::class, 'destroy'])->name('expenses.delete')->middleware('auth');