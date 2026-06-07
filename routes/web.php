<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\PortfolioController as AdminPortfolioController;
use App\Http\Controllers\Admin\ContactController as AdminContactController;
use App\Http\Controllers\Admin\ProfileController as AdminProfileController;

use App\Http\Controllers\AuthController;

Route::get('/', [ProfileController::class, 'landing'])->name('landing');
Route::get('/about', [ProfileController::class, 'about'])->name('about');
Route::get('/portfolio', [ProfileController::class, 'portfolio'])->name('portfolio');
Route::get('/contact', [ProfileController::class, 'contact'])->name('contact');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::prefix('admin')->name('admin.')->middleware('auth')->group(function () {
	Route::get('/', function() {
		$portfolioCount = \App\Models\Portfolio::count();
		$portfolios = \App\Models\Portfolio::latest()->get();
		return view('admin.dashboard', compact('portfolioCount','portfolios'));
	})->name('dashboard');
	Route::resource('portfolios', AdminPortfolioController::class)->except(['show']);
	Route::get('contact', [AdminContactController::class, 'edit'])->name('contact.edit');
	Route::put('contact', [AdminContactController::class, 'update'])->name('contact.update');
	Route::get('profile', [AdminProfileController::class, 'edit'])->name('profile.edit');
	Route::put('profile', [AdminProfileController::class, 'update'])->name('profile.update');
});
