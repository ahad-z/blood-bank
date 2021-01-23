<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RequestBloodController;
use App\Http\Controllers\Auth\AuthController;




/**
 * @group Root
 *
 * This route help to see the welcome blade
 * 
 */
Route::get('/', function () {
    return view('welcome');
});