<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;

Route::get('/addNew', [NewsController::class, 'create'])->name('news.create');
Route::post('/addNew', [NewsController::class, 'store'])->name('news.store');
Route::get('/', [NewsController::class, 'index'])->name('news.index');
Route::get('view', [NewsController::class, 'newView'])->name('news.view');
Route::get('editNew', [NewsController::class, 'edit'])->name('news.edit');
Route::put('editNew', [NewsController::class, 'update'])->name('news.update');


Route::post('requestCode', [LoginController::class, 'requestCode'])->name('login.request');
Route::post('checkCode', [LoginController::class, 'checkCode'])->name('login.check');

Route::get('login', [LoginController::class, 'index'])->name('login');
