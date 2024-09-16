<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NewsController;

Route::get('/addNew', [NewsController::class, 'create'])->name('news.create');
Route::post('/addNew', [NewsController::class, 'store'])->name('news.store');
Route::get('/', [NewsController::class, 'index'])->name('news.index');
