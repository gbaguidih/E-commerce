<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WelcomeController;





//Categories
Route::get('/categories',[CategoryController::class,'index'])->name("index.categories");
Route::get('/categories/create',[CategoryController::class,'create'])->name("create.categories");
Route::post('/categories/store',[CategoryController::class,'store'])->name("store.categories");
Route::delete('/categories/{id}',[CategoryController::class,'destroy'])->name("destroy.categories");
Route::get('/categories/{id}',[CategoryController::class, 'show'])->name("show.categories");
Route::get('/categories/{id}/edit',[CategoryController::class, 'edit'])->name("edit.categories");
Route::put('/categories/{id}',[CategoryController::class, 'update'])->name("update.categories");


// Produts
Route::get('/products',[ProductController::class,'index'])->name("index.products");
Route::get('/products/create',[ProductController::class,'create'])->name("create.products");
Route::post('/products/store',[ProductController::class,'store'])->name("store.products");
Route::delete('/products/{id}',[ProductController::class,'destroy'])->name("destroy.products");
Route::get('/products/{id}/edit',[ProductController::class,'edit'])->name("edit.products");
Route::put('/products/{id}',[ProductController::class, 'update'])->name("update.products");

Route::get('/',[WelcomeController::class,'index'])->name('welcome');


