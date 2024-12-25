<?php 

use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\ValidUser;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

// Home page
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (requires ValidUser middleware)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(ValidUser::class)->name('dashboard');

// Logout route
Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->middleware('auth')
    ->name('logout');

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// PageController routes
Route::get('/h', [PageController::class, 'home'])->name('home');
Route::get('/coming-soon', [PageController::class, 'comingSoon'])->name('coming-soon');
Route::get('/avatar', [PageController::class, 'avatar'])->name('avatar');

// MovieController resourceful routes
Route::resource('movies', MovieController::class)->middleware(ValidUser::class);

// Now-showing route
Route::get('/now-showing', [MovieController::class, 'nowShowing'])->name('now-showing');

// Search route
Route::get('/search', [MovieController::class, 'search'])->name('search');


// Authentication routes
require __DIR__.'/auth.php';
