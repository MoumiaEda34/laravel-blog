<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
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

Route::get('/', [BlogController::class,'index'])->name('blogs.index');
Route::get('/create', [BlogController::class,'create'])->name('blogs.create');
Route::post('/save-post', [BlogController::class,'store'])->name('posts.store');
Route::put('/blogs/{id}', [BlogController::class, 'update'])->name('blogs.update');
Route::get('/blogs/{id}/edit', [BlogController::class, 'edit'])->name('blogs.edit');
Route::delete('/blogs/{id}', [BlogController::class, 'destroy'])->name('blogs.destroy');

