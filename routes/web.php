<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\user\userController;
use App\Http\Controllers\admin\adminController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\admin\PostController;

use App\Http\Controllers\user\BlogPostsController;


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__.'/auth.php';

Route::middleware(['auth', 'user'])->group(function () {
    Route::get('dashboard', [userController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth','admin'])->group(function(){
    Route::prefix('admin')->name('admin.')->group(function () {
        Route::get('dashboard', [adminController::class, 'index'])->name('dashboard');
        Route::resource('users', adminController::class);
        Route::resource('posts', PostController::class);
    });
    
});


Route::get('/blogs', [BlogPostsController::class, 'index'])->name('blogs.index');
Route::get('/blogs/{id}', [BlogPostsController::class, 'show'])->name('blogs.show');



Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login')->with('success', 'You have been logged out.');
})->name('logout');


