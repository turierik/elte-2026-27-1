<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

Route::get('/', [PostController::class, 'index']) -> name('posts.index');
Route::get('/posts/create', [PostController::class, 'create']) -> name('posts.create');
Route::get('/posts/{post}', [PostController::class, 'show']) -> name('posts.show');
Route::post('/posts', [PostController::class, 'store']) -> name('posts.store');


Route::get('/dashboard', function () {
    return redirect() -> route('posts.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
