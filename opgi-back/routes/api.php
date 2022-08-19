<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BienController;

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
Route::get('/biens', [BienController::Class , 'index']);
Route::get('/biens/{id}', [BienController::Class , 'show']);
Route::get('/locataire/{id}', [BienController::Class , 'showLocataire']);
Route::get('/qloye/{id}', [BienController::Class , 'showQloye']);




