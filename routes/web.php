<?php

use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ArticleController::class, 'index'])->name('list');
Route::get('/article/{article}', [ArticleController::class, 'detail'])->name('detail');
Route::get('/new', [ArticleController::class, 'new'])->name('new');
Route::post('/new', [ArticleController::class, 'save'])->name('new-save');
