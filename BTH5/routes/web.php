<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
Route::get('/', function () {
    return view('layouts/app');
});
Route::resource('customers', CustomerController::class);
