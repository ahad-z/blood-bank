<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RequestBloodController;
use App\Http\Controllers\AcceptRequestController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\DonationController;
use App\Http\Controllers\Auth\AuthController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::post('/registration', [UserController::class, 'store']);
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/accept-request', [RequestBloodController::class, 'requestAccept'])->name('acceptRequest');

Route::group(['middleware' => 'auth:api'], function(){
	Route::get('/logout', [AuthController::class, 'logOut']);
	Route::post('/blood-request', [RequestBloodController::class, 'bloodRequest']);
	Route::get('/request-history', [RequestBloodController::class, 'requestHistory']);
	Route::get('/feedbacks', [FeedbackController::class, 'feedbacks']);
	Route::post('/feedback', [FeedbackController::class, 'feedbackStore']);
	Route::get('/feedback/{id}', [FeedbackController::class, 'show']);
	Route::get('/accept-user', [AcceptRequestController::class, 'showAcceptUser']);
	Route::post('/add-donor', [AcceptRequestController::class, 'addDonor']);
	Route::get('/donation-history', [DonationController::class, 'donationHistory']);
	Route::get('/donation-history/{id}', [DonationController::class, 'show']);
});
