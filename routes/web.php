<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
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

Route::get("/posts", [PostController::class, 'posts'])->name('posts');
Route::get("/posts/create", [PostController::class, 'add_post'])->name('add_post');
Route::post("/posts/store", [PostController::class, 'store_post'])->name('store_post');
Route::delete("/posts/delete/{id}", [PostController::class, 'delete_post'])->name('delete_post');
Route::get("/posts/{id}/edit", [PostController::class, 'edit_post'])->name('edit_post');
Route::patch("/posts/update/{id}", [PostController::class, 'update_post'])->name('update_post');
