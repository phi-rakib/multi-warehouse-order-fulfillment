<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;

Route::resource('warehouses', WarehouseController::class);
Route::resource('products', ProductController::class);
