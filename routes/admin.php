<?php

use App\Http\Controllers\Backend\AdminController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\ProductVariantController;
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

/**
 *-----------------------------------------------------------------------------
 * Slider Routes
 *-----------------------------------------------------------------------------
 */
Route::post('image/store', [ImageController::class, 'store'])
    ->name('image.store');

Route::delete('image/delete', [ImageController::class, 'destroy'])
    ->name('image.delete');

Route::resource('slider', SliderController::class);

/**
 *-----------------------------------------------------------------------------
 * Store Routes
 *-----------------------------------------------------------------------------
 */
Route::resource('store', StoreController::class);
Route::post('store/toggle/{store}', [StoreController::class, 'toggle'])->name('store.toggle');

/**
 *-----------------------------------------------------------------------------
 * Category Routes
 *-----------------------------------------------------------------------------
 */
Route::resource('category', CategoryController::class);

Route::delete('category/delete/{category}', [CategoryController::class, 'destroyWithSubCategory'])
    ->name('category.keep');

Route::post('category/toggle/{category}', [StoreController::class, 'toggle'])
    ->name('sub-category.toggle');

Route::resource('sub-category', SubCategoryController::class);

Route::post('sub-category/toggle/{sub_category}', [SubCategoryController::class, 'toggle'])
    ->name('sub-category.toggle');

/**
 *-----------------------------------------------------------------------------
 * Brand Routes
 *-----------------------------------------------------------------------------
 */
Route::resource('brand', BrandController::class);

Route::post('brand/toggle/{brand}', [SubCategoryController::class, 'toggle'])
    ->name('sub-category.toggle');

/**
 *-----------------------------------------------------------------------------
 * Product Routes
 *-----------------------------------------------------------------------------
 */
Route::get('product/get-categories', [ProductController::class, 'getCategories'])
    ->name('product.get-categories');

Route::get('product/get-sub-categories', [ProductController::class, 'getSubCategories'])
    ->name('product.get-sub-categories');

Route::resource('product', ProductController::class);

Route::delete('product/tag/delete/{product}', [ProductController::class, 'removeTag'])->name('product.tag.destroy');

Route::post('brand/toggle/{brand}', [ProductController::class, 'toggle'])
    ->name('product.toggle');

/**
 *-----------------------------------------------------------------------------
 * Product Variant Routes
 *-----------------------------------------------------------------------------
 */
Route::get('product-variant/create/{id}', [ProductVariantController::class, 'create'])
    ->name('product-variant.create');

Route::post('product-variant/store', [ProductVariantController::class, 'store'])
    ->name('product-variant.store');

Route::get('product-variant/edit/{id}', [ProductVariantController::class, 'edit'])
    ->name('product-variant.edit');

Route::put('product-variant/update/{id}', [ProductVariantController::class, 'update'])
    ->name('product-variant.update');

Route::delete('product-variant/gallery/delete', [ProductVariantController::class, 'imageDelete'])
    ->name('product-variant.image.delete');

Route::delete('product-variant/tag/delete', [ProductVariantController::class, 'removeTag'])
    ->name('product-variant.tag.destroy');

Route::post('product/gallery/make-primary/{id}', [ProductController::class, 'makeImagePrimary'])
    ->name('product.make-primary');
