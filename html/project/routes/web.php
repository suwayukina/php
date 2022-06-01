<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/top','App\Http\Controllers\TopController@index');


Route::post('/goods_masters',[App\Http\Controllers\OfficeMasterController::class,'index']);

// office_masters　テーブル
Route::get('office_masters',[App\Http\Controllers\OfficeMasterController::class,'index']);
Route::post('office_masters',[App\Http\Controllers\OfficeMasterController::class,'index']);

// people　テーブル
Route::get('people',[App\Http\Controllers\PersonController::class,'index']);
Route::post('people',[App\Http\Controllers\PersonController::class,'index']);
