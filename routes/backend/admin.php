<?php

use App\Http\Controllers\Backend\DashboardController;

/*
 * All route names are prefixed with 'admin.'.
 */
Route::redirect('/', '/admin/dashboard', 301);
Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
Route::delete('portfolio/photo/{id}', 'PortfolioController@destroyPhoto')->name('portfolio.photo.destroy');

Route::resource('portfolio', PortfolioController::class);
Route::resource('portfolio-category', PortfolioCategoryController::class);

