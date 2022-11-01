<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CertificationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[AuthController::class,'login'] );
Route::get('/register',[AuthController::class,'create']);
Route::get('/user',[AuthController::class,'index']);
Route::get('/user/edit/{id}',[AuthController::class,'show']);

Route::get('/certification',[CertificationController::class,'index']);
Route::get('/certification/add',[CertificationController::class,'create']);
Route::get('/certification/detail/{id}',[CertificationController::class,'show']);
Route::get('/certification/sign',[CertificationController::class,'sign']);



