<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::post('login',[AuthController::class,'login']);
Route::post('register',[AuthController::class,'register']);

Route::group(['prefix' => 'product','middleware'=> [
    'auth:sanctum']],function(){

Route::get('all',[ProductController::class,'all']);
Route::get('view',[ProductController::class,'view']);
Route::post('store',[ProductController::class,'store']);
Route::get('delete',[ProductController::class,'delete']);
Route::post('update',[ProductController::class,'update']);

    });