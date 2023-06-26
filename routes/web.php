<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Sayfa\EkdizmeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/',                     [EkdizmeController::class, 'index'])->name('ekdizme.index');
Route::post('/ek/post',             [EkdizmeController::class, 'create'])->name('ek.ekle');
Route::get('/ek/post/{id}',         [EkdizmeController::class, 'edit'])->name('Ekdizme.edit');
Route::post('/ek/post/edit',        [EkdizmeController::class, 'update'])->name('Ekdizme.edit.post');
Route::get('/ek/post/onayla/{id}',  [EkdizmeController::class, 'show'])->name('Ekdizme.edit.onayla');






Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
