<?php

use App\Http\Controllers\Pages;
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
//Pages Routing
Route::middleware('auth')->group(function (){
    Route::get('/add-new',[Pages::class, 'addNewPage'])->name('add-new');
    Route::get('/manage',[Pages::class, 'managePage'])->middleware(['role:Admin'])->name('dashboard');
    Route::get('/edit/{id}',[Pages::class, 'editPage'])->name('edit');
    Route::get('/view-all',[Pages::class, 'viewPage'])->name('viewAll');
});



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
