<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndustriesController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('industries', \App\Http\Controllers\IndustryController::class);
