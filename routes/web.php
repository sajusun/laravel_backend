<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('about', function () {
    return view('about');
});
Route::get('services', function () {
    return view('services');
});
Route::get('portfolio', function () {
    return view('portfolio');
});

Route::get('elements', function () {
    return view('elements');
});
Route::get('portfolio-details', function () {
    return view('portfolio-details');
});
Route::get('blog', function () {
    return view('blog');
});
Route::get('single-blog', function () {
    return view('single-blog');
});
Route::get('contact', function () {
    return view('contact');
});





Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
