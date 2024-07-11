<?php

use App\Http\Controllers\WarehouseController;
use Illuminate\Support\Facades\Route;

Route::resource('warehouses', WarehouseController::class);
