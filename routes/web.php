<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactUsController;

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
//expenses app
Route::get('expenses-app/user', function () {
    return view('expensesApp.user');
});
Route::get('expenses-app/in', function () {
    return view('expensesApp.expenses_in');
});
// Route::get('contact', function () {
//     return view('contact');
// });
Route::get('/contact', [ContactUsController::class, 'create'])->name('contact');
Route::post('/contact', [ContactUsController::class, 'store']);




// need auth

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
