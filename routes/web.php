<?php

use App\Http\Controllers\ProductController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[ProductController::class,'index'])->name('index');
Route::post('store',[ProductController::class,'store'])->name('store');
Route::get('edit/{id}',[ProductController::class,'Edit'])->name('edit');
Route::post('update/{id}',[ProductController::class,'Update'])->name('update');
Route::get('delete/{id}',[ProductController::class,'Delete'])->name('delete');
Route::get('search',[ProductController::class,'Search'])->name('search');