<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactUsController;

Route::get('/', function () {
    return view('welcome');
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


//expenses app.............
Route::any('expenses-app/user', function () {
    return view('expensesApp.app');
})->middleware(['auth']);
Route::any('expenses-app/login', function () {
    return view('expensesApp.pages.login');
});
Route::any('expenses-app/register', function () {
    return view('expensesApp.pages.register');
});
Route::any('expenses-app/reset', function () {
    return view('expensesApp.pages.reset');
});
Route::any('expenses-app/reset/{token}', function (Request $request) {
    $query = DB::table('password_reset_tokens')->where('token', $request->token)->first();
    if (!$query){
        return view('expensesApp.pages.invalid');
    }
    return view('expensesApp.pages.reset_password');
});
Route::get('expenses-app/in/list', function () {
    return view('expensesApp.pages.expenses_in');
});
Route::get('expenses-app/out/list', function () {
    return view('expensesApp.pages.expenses_out');
});
Route::get('expenses-app/out/list/{id}/view', function () {
    return view('expensesApp.pages.single_view');
});
Route::get('expenses-app/in/list/{id}/view', function () {
    return view('expensesApp.pages.single_view');
});
Route::get('expenses-app/in/add', function () {
    return view('expensesApp.pages.expenses_in_add');
});
Route::get('expenses-app/out/add', function () {
    return view('expensesApp.pages.expenses_out_add');
});

Route::get('expenses-app/user/contact', function () {
    return view('expensesApp.pages.contact');
});

Route::get('expenses-app/user/profile', function () {
    return view('expensesApp.pages.profile');
});
Route::get('expenses-app/user/settings', function () {
    return view('expensesApp.pages.settings');
});

Route::get('/user/invalid', function (){
    return view('expensesApp.pages.invalid');
})->name('invalid');

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

require __DIR__ . '/auth.php';
