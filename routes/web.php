<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

// ✅ Route setelah login
Route::get('/dashboard', function () {
    return redirect()->route('tasks.index');
})->middleware(['auth'])->name('dashboard');

// ✅ Route profile (agar tidak error setelah login)
Route::get('/profile', function () {
    return 'Halaman profil belum tersedia.';
})->middleware(['auth'])->name('profile');

// ✅ Route untuk CRUD tugas
Route::middleware(['auth'])->group(function () {
    Route::resource('tasks', TaskController::class);
});

// ✅ Otentikasi (register, login, logout) dari Laravel Breeze
require __DIR__.'/auth.php';
