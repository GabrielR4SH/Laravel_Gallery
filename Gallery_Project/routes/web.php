<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PhotoController;


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

Route::get('/', [PhotoController::class, 'index'])->name('index');

Route::post('/store', [PhotoController::class, 'store'])->name('store');
Route::get('/edit/{photo}', [PhotoController::class, 'edit'])->name('photo.edit');
Route::put('/update/{photo}', [PhotoController::class, 'update'])->name('update');
Route::delete('/delete/{photo}', [PhotoController::class, 'delete'])->name('delete');
