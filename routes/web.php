<?php

use App\Http\Controllers\AboutController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\PortoController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\SinglePortoController;
use App\Http\Controllers\SinglePostController;

Route::get('/', [homeController::class, 'index']);
Route::get('/posts', [PostController::class, 'post']);
Route::get('/post/{post:slug}', [SinglePostController::class, 'single'])->name('post.single');
Route::get('/categories/{category:slug}', [PostController::class, 'post']);
Route::get('/portfolio', [PortoController::class, 'porto']);
Route::get('/portfolios/{porto:slug}', [SinglePortoController::class, 'single'])->name('porto.single');
Route::get('/about', [AboutController::class, 'index']);
Route::post('/about', [AboutController::class, 'submitContact'])->name('contact.submit');
