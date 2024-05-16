<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WelcomeController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');

Route::get('/blog', function () {
    return view('blog');
});

Route::get('/news/guestNews', [NewsController::class, 'guestNews'])->name('news.guestNews');
Route::resource('/news', NewsController::class);
Route::get('/news/stared/{news}', [NewsController::class, 'stared'])->name('news.stared');
Route::get('/news/guestShow/{news}', [NewsController::class, 'guestShow'])->name('news.guestShow');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
