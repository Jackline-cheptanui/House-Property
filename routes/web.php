<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Route;


Route::get('/', [UUUUserController::class, 'index']);
Route::post('/add/property',[UUUUserController::class, 'create']);
Route::get('/get/property',[UUUUserController::class, 'getproperty'])->name('property.get');


