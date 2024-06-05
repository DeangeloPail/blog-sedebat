<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WelcomeController;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

Route::get('/', [WelcomeController::class, 'index'])->name('welcome');



Route::get('/blog', function () {
    return view('blog');
});

Route::get('/autorProfile/{id}', function ($id) {
    return view('autorProfile', compact('id'));
})->name('autorProfile');

Route::get('/writers', function () {
    return view('writers.index');
})->name('writers');



Route::get('/news/guestNews', [NewsController::class, 'guestNews'])->name('news.guestNews');
Route::resource('/news', NewsController::class);
Route::get('/news/stared/{news}', [NewsController::class, 'stared'])->name('news.stared');
Route::get('/news/guestShow/{news}', [NewsController::class, 'guestShow'])->name('news.guestShow');

Route::middleware(['auth'])->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');
    Route::post('/register', [RegisteredUserController::class, 'store']);
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/news.index', function () {
        return view('news');
    })->name('news');
});
