<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use Monolog\Handler\RotatingFileHandler;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/book/create', function(){
    return view('book.book');
})->name('book.create');

Route::post('/book/store',[BookController::class,'store'])->name('book.store');
Route::get('/book/show',[BookController::class, 'show'])->name('book.show');
Route::get('book/edit/{id}',[BookController::class,'edit'])->name('book.edit');
Route::post('book/update/{id}',[BookController::class,'update'])->name('book.update');
Route::get('book/delete/{id}',[BookController::class,'delete'])->name('book.delete');