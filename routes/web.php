<?php

use App\Http\Controllers\RevisorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;

Route::get('/', [PublicController::class, 'welcome'])->name('welcome');
Route::get('auth/register', [PublicController::class, 'register']);
Route::get('auth/login',[PublicController::class, 'login']) ->name('accesso');
Route::post('registrato', [PublicController::class, 'registerDone'])->name('registrazione');


//articoli
Route::get('article/create', [ArticleController::class, 'create'])->name('article.create');
Route::post('article/store', [ArticleController::class, 'store'])->name('article.store');
Route::get('article/index', [ArticleController::class, 'index'])->name('article.index');
Route::get('article/show/{article}', [ArticleController::class, 'show'])->name('article.show');
route::get('article/category/{category}', [ArticleController::class, 'byCategory'])->name('article.byCategory');
Route::get('article/redattore/{user}', [ArticleController::class, 'byUser'])->name('article.byUser');



//richieste ruoli
Route::get('careers',[PublicController::class, 'careers'])->name('careers');
route::post('career/submit',[PublicController::class, 'careersSubmit'])->name('career.submit');

//admin
Route::middleware('admin')->group(function(){
    route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    route::patch('admin/{user}/set-admin',[AdminController::class, 'setAdmin'])->name('admin.setAdmin');
    route::patch('admin/{user}/set-revisor',[AdminController::class, 'setRevisor'])->name('admin.setRevisor');
    route::patch('admin/{user}/set-writer',[AdminController::class, 'setWriter'])->name('admin.setWriter');
    route::put('admin/edit/tag/{tag}',[AdminController::class,'editTag'])->name('admin.editTag');
    route::delete('admin/delete/tag/{tag}',[AdminController::class,'deleteTag'])->name('admin.deleteTag');
    route::put('admin/edit/category/{category}',[AdminController::class,'editCategory'])->name('admin.editCategory');
    route::delete('admin/delete/category/{category}',[AdminController::class,'deleteCategory'])->name('admin.deleteCategory');
    route::post('admin/category/store',[AdminController::class,'storeCategory'])->name('admin.storeCategory');
});

// revisor
Route::middleware('revisor')->group(function(){
    route::get('revisor/dashboard', [RevisorController::class,'dashboard'])->name('revisor.dashboard');
    route::post('revisor/{article}/accept', [RevisorController::class,'acceptArticle'])->name('revisor.acceptArticle');
    route::post('revisor/{article}/reject', [RevisorController::class,'rejectArticle'])->name('revisor.rejectArticle');
    route::post('revisor/{article}/undo', [RevisorController::class,'undoArticle'])->name('revisor.undoArticle');
});

//writer

Route::middleware('writer')->group(function(){
    Route::get('article/create', [ArticleController::class,'create'])->name('article.create');
    Route::post('article/store', [ArticleController::class,'store'])->name('article.store');
});

//ricerca 
route::get('article/search', [ArticleController::class,'articleSearch'])->name('article.search');