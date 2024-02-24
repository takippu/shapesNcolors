<?php

use App\Http\Controllers\Api\ShapeAndColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//RESTful APIs
Route::get('/fetch-all', [ShapeAndColor::class, 'fetchAll'])->name('fetchAll'); //get all records
Route::post('/insert-new', [ShapeAndColor::class, 'insertNew'])->name('insertNew'); //insert new record
Route::delete('/delete/{id}', [ShapeAndColor::class, 'deleteEntry'])->name('deleteEntry'); //delete specific record
Route::put('/update/{id}', [ShapeAndColor::class, 'updateEntry'])->name('updateEntry'); //update specific record
