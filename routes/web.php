<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\AlertController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use Illuminate\Support\Facades\Route;

Route::get('/', [PostController::class, 'index'])->name('home');
Route::get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('post/{post:slug}/comments', [PostCommentsController::class, 'store']);

Route::post('newsletter', NewsletterController::class);

Route::post('register', [RegisterController::class, 'store'])->middleware('guest');
Route::get('register', [RegisterController::class, 'create'])->middleware('guest');

Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('login', [SessionsController::class, 'store'])->middleware('guest');
Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth');

Route::get('admin/posts/{post}/alert', [AlertController::class, 'delete']);
Route::get('admin/posts/{post}/alert/pub', [AlertController::class, 'pub']);
Route::get('admin/posts/{post}/alert/draft', [AlertController::class, 'draft']);

Route::patch('admin/posts/{post}/draft', [AdminPostController::class, 'draft']);
Route::patch('admin/posts/{post}/pub', [AdminPostController::class, 'pub']);

Route::middleware('can:admin')->group(function () {
    Route::resource('admin/posts', AdminPostController::class)->except('show');
});
