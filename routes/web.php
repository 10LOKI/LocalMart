<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});
Route::middleware(['auth','permission:view-products']) -> group(function ()
{
    Route::get('/products',[ProductController::class,'index']);
});
Route::middleware(['auth','role:admin']) ->group(function ()
{
    Route::get('/admin', [AdminController::class, 'index']);
});
