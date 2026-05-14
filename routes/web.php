<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;

Route::view('/', 'welcome')->name('home');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', [RegisterController::class, 'create'])->name('register');
Route::post('/register', [RegisterController::class, 'store'])->name('register.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');
});

Route::middleware(['auth', 'verified'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {
        Route::get('/dashboard', function () {
            abort_unless(auth()->user()->is_admin, 403);

            return view('admin.dashboard');
        })->name('dashboard');

        Route::get('/dogs', function () {
            abort_unless(auth()->user()->is_admin, 403);

            return view('admin.dogs.index');
        })->name('dogs.index');
    });

require __DIR__ . '/settings.php';