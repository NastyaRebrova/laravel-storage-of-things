<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ThingController;

Route::get('/', function () {return view('layout');});

Route::get('/auth/signin', [AuthController::class, 'signIn']);
Route::post('/auth/registr', [AuthController::class, 'registr']);
Route::get('/auth/login', [AuthController::class, 'login'])->name('login');
Route::post('/auth/authenticate', [AuthController::class, 'authenticate']);
Route::get('/auth/logout', [AuthController::class, 'logout']);

Route::get('/things', [ThingController::class, 'index'])->name('things.index');
Route::get('/things/create', [ThingController::class, 'create'])->name('things.create');
Route::post('/things', [ThingController::class, 'store'])->name('things.store');
Route::get('/things/{thing}', [ThingController::class, 'show'])->name('things.show');
Route::get('/things/{thing}/edit', [ThingController::class, 'edit'])->name('things.edit');
Route::put('/things/{thing}', [ThingController::class, 'update'])->name('things.update');
Route::delete('/things/{thing}', [ThingController::class, 'destroy'])->name('things.destroy');
