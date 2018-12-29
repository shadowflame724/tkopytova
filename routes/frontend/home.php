<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\PortfolioPhotosController;
use App\Http\Controllers\Frontend\AboutController;
use App\Http\Controllers\Frontend\ForSaleController;

/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::get('about', [AboutController::class, 'index'])->name('about');
Route::get('for_sale', [ForSaleController::class, 'index'])->name('for_sale');
Route::get('{category_slug}/{portfolio_slug}', [PortfolioPhotosController::class, 'index'])->name('portfolio.photos');
Route::get('{slug?}', [HomeController::class, 'index'])->name('index');
