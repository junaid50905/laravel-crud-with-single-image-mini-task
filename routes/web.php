<?php

use App\Http\Controllers\SingleImageController;
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

Route::post('/store', [SingleImageController::class, 'store'])->name('store');
Route::get('/', [SingleImageController::class, 'index'])->name('index');
Route::get('/edit/{id}', [SingleImageController::class, 'edit'])->name('edit');
Route::post('/update/{id}', [SingleImageController::class, 'update'])->name('update');
Route::get('/destroy/{id}', [SingleImageController::class, 'destroy'])->name('destroy');
