<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;

Route::get('/', [ProfileController::class, 'landing'])->name('landing');
Route::get('/about', [ProfileController::class, 'about'])->name('about');
Route::get('/portfolio', [ProfileController::class, 'portfolio'])->name('portfolio');
Route::get('/contact', [ProfileController::class, 'contact'])->name('contact');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', fn () => redirect()->route('admin.portfolios.index'))->name('dashboard');
    Route::resource('portfolios', AdminPortfolioController::class)->except(['show']);
    Route::get('contact', [AdminContactController::class, 'edit'])->name('contact.edit');
    Route::put('contact', [AdminContactController::class, 'update'])->name('contact.update');
});
