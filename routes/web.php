<?php

use App\Models\Episode;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\ProfileController;

Route::get('/', function () {
    $comments = Episode::find(1)->comments;
    dd($comments);
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/articles/{article:slug}', ArticleController::class)->name('articles.show');
    Route::get('/episodes/{episode:slug}', EpisodeController::class)->name('episodes.show');
});

require __DIR__ . '/auth.php';
