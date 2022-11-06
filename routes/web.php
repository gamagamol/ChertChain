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

Route::get('/',[AuthController::class,'login'] )->name('login')->middleware('guest');
Route::post('/',[AuthController::class,'CheckAuth'] );
Route::get('/register',[AuthController::class,'create'])->middleware('guest');
Route::post('/register',[AuthController::class,'CreateUser']);


route::get('/home',[AuthController::class,'home']);

Route::get('/user',[AuthController::class,'index']);
Route::get('/user/edit/{id}',[AuthController::class,'show']);
Route::post('/user/update/{id}',[AuthController::class,'update']);




Route::get('/certification',[CertificationController::class,'index']);
Route::get('/certification/add',[CertificationController::class,'create']);
Route::post('/certification/store',[CertificationController::class, 'store']);
Route::get('/certification/detail/{id}',[CertificationController::class,'show']);
Route::get('/certification/sign_detail/{id}',[CertificationController::class, 'SignDetail']);

Route::post('/certification/update_sign',[CertificationController::class, 'UpdateSign']);

Route::get('/certification/sign',[CertificationController::class,'sign']);
Route::get('/certification/holder',[CertificationController::class,'holder']);
Route::get('/certification/holder_detail/{id}',[CertificationController::class, 'HolderDetail']);


Route::post('/certification/update_all', [CertificationController::class, 'UpdateAll']);

