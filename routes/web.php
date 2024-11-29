<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;

Route::get('/', [PublicController::class, 'welcome'])->name('welcome');
Route::get('auth/register', [PublicController::class, 'register']);
Route::get('auth/login',[PublicController::class, 'login']) ->name('accesso');
Route::post('registrato', [PublicController::class, 'registerDone'])->name('registrazione');


//articoli
Route::get('article/create', [ArticleController::class, 'create'])->name('article.create');
Route::post('article/store', [ArticleController::class, 'store'])->name('article.store');