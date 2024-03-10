<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProfileController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\StoreController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\ImageController;
use Illuminate\Support\Facades\Route;

Route::get('dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
Route::get('profile', [ProfileController::class, 'index'])->name('profile');
Route::post('profile/update', [ProfileController::class, 'updatePersonalInformation'])->name('profile.update');
Route::post('profile/password-update', [ProfileController::class, 'passwordUpdate'])->name('profile.password-update');

/** Slider Routes */
Route::post('image/store', [ImageController::class, 'store'])->name('image.store');
Route::delete('image/delete', [ImageController::class, 'destroy'])->name('image.delete');
Route::resource('slider', SliderController::class);

/** Store Routes */
Route::resource('store', StoreController::class);
Route::post('store/toggle/{store}', [StoreController::class, 'toggle'])->name('store.toggle');

/** Category Routes */
Route::resource('category', CategoryController::class);
Route::delete('category/delete/{category}', [CategoryController::class, 'destroyWithSubCategory'])->name('category.keep');
Route::post('category/toggle/{category}', [StoreController::class, 'toggle'])->name('sub-category.toggle');

Route::resource('sub-category', SubCategoryController::class);
Route::post('sub-category/toggle/{sub_category}', [SubCategoryController::class, 'toggle'])->name('sub-category.toggle');
