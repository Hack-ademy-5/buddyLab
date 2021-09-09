<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ContactController;

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

//Route::view('/', 'welcome');
Route::get('/', [PublicController::class, 'home'])->name('home');

Route::get('articles/create', [ArticleController::class, 'create'])->name('articles.create');
Route::post('articles', [ArticleController::class, 'store'])->name('articles.store');

Route::get('articles' , [ArticleController::class, 'index'])->name('articles.index');
Route::get('articles/{id}', [ArticleController::class,'show'])->name('articles.show');
Route::get('articles/{id}/edit', [ArticleController::class,'edit'])->name('articles.edit');
Route::put('articles/{id}', [ArticleController::class,'update'])->name('articles.update');
Route::delete('articles/{id}', [ArticleController::class,'destroy'])->name('articles.destroy');

// contacto
Route::get('contacts/create',[ContactController::class,'create'])->name('contacts.create');
Route::post('contacts',[ContactController::class,'store'])->name('contacts.store');
